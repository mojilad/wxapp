function t(t, i, e) {
    return i in t ? Object.defineProperty(t, i, {
        value: e,
        enumerable: !0,
        configurable: !0,
        writable: !0
    }) : t[i] = e, t;
}

var i, e = getApp();

Page((i = {
    data: {
        windowH: 0,
        boxH: 0,
        rankListH: 0,
        showRank: !1,
        rank: {
            type: "level",
            page: 1,
            page_size: 10,
            list: [],
            more: !0
        },
        registerStatus: !1,
        userInfo: e.user,
        icons: {
            jinbi: "/wei_idiom/resource/icon/index/jinbi.png",
            balance: "/wei_idiom/resource/icon/index/redbag.png",
            close_515151: "/wei_idiom/resource/icon/index/close_515151.png",
            rank: "/wei_idiom/resource/icon/index/rank.png",
            invite: "/wei_idiom/resource/icon/index/invite.png",
            award: "/wei_idiom/resource/icon/index/award.png",
            broad: "/wei_idiom/resource/icon/gg.png",
            service: "/wei_idiom/resource/icon/index/service.png",
            recommend: "/wei_idiom/resource/icon/index/recommend.png",
            feedback: "/wei_idiom/resource/icon/index/feedback.png",
            video: "/wei_idiom/resource/icon/index/video.png"
        },
        images: {
            title: "/wei_idiom/resource/images/title2.png"
        },
        setting: {
            unit_id: ""
        },
        shareScene: "home",
        ylStatus: "hide",
        adv: {
            status: !1,
            data: []
        },
        loginCompStatus: !1,
        animate: "dsne",
        broadList: [],
        showBroad: !1,
        ylboxh: "",
        gzh_box_status: !1,
        canIUseInterstitialAd: e.canIUseInterstitialAd,
        interstitialAd: null
    },
    onReady: function() {
        this.initSystemInfo(), e.initConfig(this.initConfigBack);
    },
    initSystemInfo: function() {
        var t = wx.getSystemInfoSync(), i = t.windowHeight * (750 / t.screenWidth), e = i - 100, n = e - 224;
        this.setData({
            windowH: i,
            boxH: e,
            rankListH: n
        });
    },
    initConfigBack: function() {
        var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null, i = this;
        if (null != t) {
            var e = t.setting, n = t.adv, a = "360rpx";
            e.status && (e.data.hasOwnProperty("gzh_img") && "" != e.data.gzh_img && "" != e.data.gzh_ewm_img && (a = "480rpx"), 
            i.setData({
                setting: e.data
            }), "" !== e.data.name && wx.setNavigationBarTitle({
                title: e.data.name
            })), i.setData({
                adv: n,
                ylboxh: a
            }), i.initInterstitialAd();
        }
    },
    onShow: function() {
        console.log("index onShow"), e.updateConfig && e.initConfig(!1, !0), e.refreshUser ? (console.log("更新用户"), 
        e.login(this.loginCallback)) : (console.log("不更新"), this.setData({
            userInfo: e.user,
            canIUseInterstitialAd: e.canIUseInterstitialAd
        }), this.showInterstitialAd());
    },
    onLoad: function(t) {
        console.log("index Onload");
        var i = this;
        e.userInfo.sessionid && "" !== e.userInfo.sessionid ? e.login(i.loginCallback) : e.sessionIdCallback = function() {
            e.login(i.loginCallback);
        };
    },
    subscribeGzh: function() {
        this.setData({
            gzh_box_status: !0
        });
    },
    pgGzhCancel: function() {
        this.setData({
            gzh_box_status: !1
        });
    },
    loginCallback: function() {
        this.setData({
            userInfo: e.user,
            registerStatus: e.registerStatus
        }), this.loadBroadCast();
    },
    loadBroadCast: function() {
        var t = this, i = !1;
        e.util.request({
            url: "entry/wxapp/broad",
            showLoading: !1,
            success: function(e) {
                var n = e.data.data;
                n.length > 0 && (i = !0), t.setData({
                    showBroad: i,
                    broadList: n
                });
            },
            fail: function(t) {
                console.log("check fail");
            }
        });
    },
    beginGame: function() {
        wx.navigateTo({
            url: "../detail/detail?from=index"
        });
    },
    goQuestion: function() {
        wx.navigateTo({
            url: e.pages.question
        });
    },
    goMore: function() {
        wx.navigateTo({
            url: e.pages.more
        });
    },
    goInvite: function() {
        wx.navigateTo({
            url: e.pages.invite
        });
    },
    goJfMall: function() {
        wx.navigateTo({
            url: e.pages.jfmall
        });
    },
    loading: !1,
    showLoginModal: function() {
        this.setData({
            loginCompStatus: !0
        });
    },
    pgLoginCancel: function() {
        this.setData({
            loginCompStatus: !1
        });
    },
    pgLoginConfirm: function(t) {
        var i = t.detail.result, n = this;
        if (i.userInfo) {
            var a = i.userInfo;
            a.vid = n.data.vid, e.register(a, n.loginCallback), n.setData({
                loginCompStatus: !1
            });
        } else console.log("用户未允许授权");
    },
    animate: {
        in: "dsbk animated fadeInRight",
        out: "animated fadeOutRight"
    },
    showYLBox: function() {
        this.setData({
            ylStatus: "show",
            animate: this.animate.in
        });
    },
    hideYLBox: function() {
        this.setData({
            ylStatus: "hide",
            animate: this.animate.out
        });
    },
    showRankList: function() {
        this.setData({
            showRank: !0
        }), 0 == this.data.rank.list.length && this.getRankList();
    },
    closeRankList: function() {
        this.setData({
            showRank: !1
        });
    }
}, t(i, "loading", !1), t(i, "getRankList", function() {
    var t = this;
    if (t.loading) console.log("慢点"); else {
        t.loading = !0;
        var i = t.data.rank;
        i.more ? e.util.request({
            url: "entry/wxapp/rank",
            data: {
                type: i.type,
                page_size: i.page_size,
                page: i.page
            },
            method: "GET",
            success: function(e) {
                0 === e.data.code && (i.page = i.page + 1, i.list = i.list.concat(e.data.data.list), 
                i.more = e.data.data.more, i.page > 3 ? i.more = !1 : i.more = 10 == e.data.data.list.length, 
                t.setData({
                    rank: i
                })), t.loading = !1;
            },
            fail: function(t) {
                console.log("load rank fail");
            }
        }) : t.loading = !1;
    }
}), t(i, "initInterstitialAd", function() {
    if (!1 !== e.canIUseInterstitialAd) {
        var t = this, i = t.data.setting;
        if (0 !== parseInt(i.screen_ad_status) && "" != i.screen_unit_id) {
            var n = null;
            wx.createInterstitialAd && ((n = wx.createInterstitialAd({
                adUnitId: i.screen_unit_id
            })).onLoad(function() {
                console.log("onLoad event emit");
            }), n.onError(function(i) {
                t.setData({
                    canIUseInterstitialAd: !1
                }), console.log("onError event emit", i);
            }), n.onClose(function(t) {
                console.log("onClose event emit", t);
            })), t.setData({
                interstitialAd: n
            }), t.showInterstitialAd();
        }
    }
}), t(i, "showInterstitialAd", function() {
    var t = this, i = this.data.interstitialAd;
    null != i && i.show().catch(function(i) {
        t.setData({
            canIUseInterstitialAd: !1
        });
    });
}), t(i, "onHide", function() {}), t(i, "onUnload", function() {}), t(i, "onShareAppMessage", function(t) {
    var i = e.getShareByScene(this.data.shareScene), n = this.data.userInfo, a = "?from=" + this.data.shareScene;
    return "1" == n.status && (a += "&vid=" + n.id), {
        title: i.title,
        path: e.pages.index + a,
        imageUrl: i.imageUrl,
        success: function(t) {},
        fail: function(t) {},
        complete: function() {}
    };
}), i));