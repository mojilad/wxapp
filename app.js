function e(e) {
    return function() {
        var i = e.apply(this, arguments);
        return new Promise(function(e, n) {
            function s(t, o) {
                try {
                    var a = i[t](o), r = a.value;
                } catch (e) {
                    return void n(e);
                }
                if (!a.done) return Promise.resolve(r).then(function(e) {
                    s("next", e);
                }, function(e) {
                    s("throw", e);
                });
                e(r);
            }
            return s("next");
        });
    };
}

var i = function(e) {
    return e && e.__esModule ? e : {
        default: e
    };
}(require("./wei_idiom/libs/regenerator-runtime/runtime")), n = require("we7/resource/js/util.js");

App({
    av: "1.1.5",
    images: {
        share: "https://we7-wxapp.oss-cn-beijing.aliyuncs.com/wxapp/wei_dati/resource/images/share/share.png"
    },
    registerStatus: !1,
    refreshUser: !1,
    user: {
        nickname: "未登录",
        headimgurl: "../../resource/icon/default.png",
        gold_num: 0,
        balance: 0,
        level: 0
    },
    vid: 0,
    sign: {},
    systemInfo: {},
    windowH: 0,
    userInfo: {
        sessionid: null
    },
    canIUseInterstitialAd: !1,
    canIUseRewardedVideoAd: !1,
    config: null,
    onLaunch: function(e) {
        console.log("app on launch"), e.query.hasOwnProperty("vid") && (this.vid = e.query.vid), 
        this.initSysInfo(), this.sessionCheck(), wx.createInterstitialAd && (this.canIUseInterstitialAd = !0), 
        wx.createRewardedVideoAd && (this.canIUseRewardedVideoAd = !0);
    },
    initSysInfo: function() {
        var e = wx.getSystemInfoSync(), i = e.windowHeight * (375 / e.screenWidth) * 2;
        this.systemInfo = e, this.windowH = i;
    },
    onShow: function(e) {
        console.log(e), console.log("app onshow");
    },
    onHide: function() {
        this.refreshUser = !0;
    },
    onError: function(e) {
        console.log(e);
    },
    util: n,
    sessionCheck: function() {
        var e = this, i = wx.getStorageSync("userInfo").sessionid;
        i ? wx.checkSession({
            success: function() {
                e.userInfo.sessionid = i, e.sessionIdCallback && (console.log("app.sessionCheck.sessionIdCallback"), 
                e.sessionIdCallback());
            },
            fail: function() {
                wx.removeStorageSync("userInfo"), e.getSessionId();
            }
        }) : e.getSessionId();
    },
    getSessionId: function() {
        var e = this;
        wx.login({
            success: function(i) {
                n.request({
                    url: "auth/session/openid",
                    data: {
                        code: i.code
                    },
                    cachetime: 0,
                    success: function(i) {
                        if (!i.data.errno) {
                            var n = i.data.data.sessionid;
                            e.userInfo.sessionid = n, wx.setStorageSync("userInfo", e.userInfo), e.sessionIdCallback && (console.log("app.getSessionId.sessionIdCallback"), 
                            e.sessionIdCallback());
                        }
                    }
                });
            },
            fail: function() {
                console.log("wx.login失败");
            }
        });
    },
    login: function() {
        var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0], i = this;
        n.request({
            url: "entry/wxapp/login",
            data: {
                vid: i.vid
            },
            success: function(n) {
                if (0 === n.data.code) {
                    i.registerStatus = !0;
                    var s = n.data.data;
                    s.level = parseInt(s.level), i.user = s;
                } else console.log("登录失败");
                0 != e && e(), i.refreshUser = !1;
            }
        });
    },
    register: function(e) {
        var i = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
        e.vid = this.vid;
        var s = this;
        n.request({
            url: "entry/wxapp/register",
            data: e,
            method: "POST",
            success: function(e) {
                if (0 === e.data.code) {
                    var n = e.data.data;
                    n.level = parseInt(n.level), s.user = n, s.registerStatus = !0, i && i();
                } else console.log("注册接口调用失败");
            },
            fail: function(e) {
                console.log("update fail");
            }
        });
    },
    updateUserGold: function(e, i) {
        var n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2], s = this.user;
        if ("+" === i) s.gold_num = parseInt(s.gold_num) + parseInt(e); else {
            if ("-" !== i) return;
            s.gold_num -= parseInt(e);
        }
        this.user = s, n && n();
    },
    updateUserBalance: function(e, i) {
        var n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2], s = this.user;
        if ("+" === i) s.balance = (parseInt(1e3 * s.balance) + parseInt(e)) / 1e3; else {
            if ("-" !== i) return;
            s.balance = (parseInt(1e3 * s.balance) - parseInt(e)) / 1e3;
        }
        this.user = s, n && n();
    },
    updateUserLevel: function(e, i) {
        var n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2], s = this.user;
        if ("+" === i) s.level = parseInt(s.level) + parseInt(e); else {
            if ("-" !== i) return;
            s.level -= parseInt(e);
        }
        this.user = s, n && n();
    },
    parseUrlParams: function(e) {
        for (var i = {}, n = e.split("&"), s = 0; s < n.length; s++) {
            var t = n[s].split("=");
            i[t[0]] = t[1];
        }
        return i;
    },
    sleepHelper: function(e) {
        return new Promise(function(i, n) {
            setTimeout(function() {
                i();
            }, e);
        });
    },
    sleep: function(n) {
        var s = this;
        return e(i.default.mark(function e() {
            return i.default.wrap(function(e) {
                for (;;) switch (e.prev = e.next) {
                  case 0:
                    return e.next = 2, s.sleepHelper(n);

                  case 2:
                  case "end":
                    return e.stop();
                }
            }, e, s);
        }))();
    },
    sad: function(e) {
        var i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 1e3;
        wx.showToast({
            title: e,
            image: "/wei_idiom/resource/icon/sad.png",
            duration: i
        });
    },
    happy: function(e) {
        var i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 1e3;
        wx.showToast({
            title: e,
            image: "/wei_idiom/resource/icon/happy.png",
            duration: i
        });
    },
    updateConfig: !1,
    initConfig: function() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null, i = arguments.length > 1 && void 0 !== arguments[1] && arguments[1], s = this;
        null == s.config || i ? n.request({
            data: {
                v: s.av
            },
            url: "entry/wxapp/config",
            success: function(i) {
                0 === i.data.code ? (s.config = i.data.data, s.updateConfig = !1, e && e(i.data.data)) : e && e();
            },
            fail: function(e) {}
        }) : e && e(this.config);
    },
    getShareByScene: function(e) {
        var i = {
            title: "[微信红包] 答题兑现金，分分钟变土豪！",
            imageUrl: this.images.share
        };
        if (null == this.config) return i;
        var n = this.config.share[e];
        if (n.length > 0) {
            var s = Math.floor(Math.random() * n.length);
            i.title = n[s].title, i.imageUrl = n[s].image;
        }
        return i;
    },
    pages: {
        index: "/wei_idiom/pages/index/index",
        detail: "/wei_idiom/pages/detail/detail",
        rank: "/wei_idiom/pages/rank/rank",
        withdraw: "/wei_idiom/pages/withdraw/withdraw",
        invite: "/wei_idiom/pages/invite/invite",
        info: "/wei_idiom/pages/info/info",
        jfmall: "/wei_idiom/pages/jf-mall/jf-mall",
        record: "/wei_idiom/pages/record/record",
        question: "/wei_idiom/pages/question/question",
        more: "/wei_idiom/pages/more/more"
    },
    siteInfo: require("siteinfo.js")
});