var t = getApp();

Page({
    data: {
        resultStatus: !1,
        userInfo: t.user,
        redbag: {
            status: !1,
            kkid: "",
            balance: 0,
            openStatus: !1
        },
        windowH: 0,
        boxH: 0,
        icons: {
            jinbi: "/wei_idiom/resource/icon/index/jinbi.png",
            close: "/wei_idiom/resource/icon/detail/close.png",
            wclose: "/wei_idiom/resource/icon/detail/poster/close.png",
            correct: "/wei_idiom/resource/icon/detail/correct.png",
            redbag: "/wei_idiom/resource/icon/redbag.png",
            open: "/wei_idiom/resource/icon/open.png"
        },
        topicList: [],
        topic: {},
        topicIndex: 0,
        errIndex: [],
        fadeClass: "",
        modalClass: "",
        bgAudio: null,
        noMoreTopic: !1,
        from: "",
        corrAudio: null,
        wrongAudio: null,
        setting: {
            unit_id: ""
        },
        shareScene: "guess",
        canIUseInterstitialAd: !1,
        interstitialAd: null,
        adv: {
            status: !1,
            data: []
        },
        loginCompStatus: !1
    },
    onLoad: function(t) {
        t.hasOwnProperty("from") && this.setData({
            from: t.from
        }), this.loadTopicList();
    },
    loadTopicList: function() {
        var e = this;
        t.util.request({
            url: "entry/wxapp/topics",
            method: "GET",
            success: function(t) {
                0 === t.data.code && (t.data.data.length > 0 ? e.setData({
                    resultStatus: !1,
                    topicList: t.data.data,
                    topicIndex: 0,
                    topic: t.data.data[0]
                }) : e.setData({
                    resultStatus: !1,
                    noMoreTopic: !0
                }));
            },
            fail: function(t) {
                console.log("register fail");
            }
        });
    },
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
    pgLoginConfirm: function(e) {
        var a = e.detail.result, i = this;
        if (a.userInfo) {
            var n = a.userInfo;
            n.vid = i.data.vid, t.register(n, i.initUser), i.setData({
                loginCompStatus: !1
            });
        } else console.log("用户未允许授权");
    },
    inChecking: !1,
    getEmptyRedbag: function() {
        return {
            status: !1,
            kkid: "",
            balance: 0,
            openStatus: !1
        };
    },
    animate: {
        modalIn: "animated fadeIn"
    },
    check: function(e) {
        var a = this, i = "", n = "", o = !1, s = this.getEmptyRedbag(), r = this.data, c = r.userInfo, d = r.errIndex, l = r.setting;
        if (t.registerStatus) if (parseInt(c.gold_num) - parseInt(l.per_guess_gold) < 0) wx.showModal({
            title: "温馨提示",
            content: "您的金币已经不足，请返回小程序首页，获取更多金币",
            confirmText: "我知道了",
            confirmColor: "#fd5757",
            success: function(t) {
                t.confirm && wx.navigateBack({
                    delta: 2
                });
            }
        }); else {
            var u = e.currentTarget.dataset.index;
            d.includes(u) ? console.log("点过了") : a.inChecking ? console.log("点击太快了哦") : (a.inChecking = !0, 
            t.util.request({
                url: "entry/wxapp/check",
                data: {
                    res_index: u,
                    topic_id: a.data.topic.id
                },
                showLoading: !0,
                success: function(e) {
                    [ 0, -2 ].includes(e.data.code) && (i = "fadeout", 0 === e.data.code ? (e.data.data.redbag.status && (s = Object.assign(s, e.data.data.redbag)), 
                    o = !0, a.showInterstitialAd(), d = [], a.bgPlay("correct")) : d.includes(u) || d.push(u), 
                    n = a.animate.modalIn, t.updateUserGold(a.data.setting.per_guess_gold, "-")), [ -1, -2 ].includes(e.data.code) && t.sad(e.data.message), 
                    a.setData({
                        fadeClass: i,
                        resultStatus: o,
                        errIndex: d,
                        redbag: s,
                        modalClass: n
                    }), a.initUser(), t.sleep(20);
                },
                fail: function(t) {
                    a.inChecking = !1, console.log("check fail");
                },
                complete: function() {
                    a.inChecking = !1, console.log("check complete");
                }
            }));
        } else this.showLoginModal();
    },
    updateUserCallback: function() {
        console.log("updateUserCallback"), this.setData({
            userInfo: t.user
        });
    },
    goHome: function() {
        "index" == this.data.from ? wx.navigateBack({
            delta: 1
        }) : wx.redirectTo({
            url: "../index/index"
        });
    },
    goNextLevel: function() {
        t.sleep(20), t.updateUserLevel(1, "+", this.initUser);
        var e = this.data, a = e.topicIndex, i = e.topicList;
        if ((a += 1) + 1 > i.length) this.loadTopicList(); else {
            var n = i[a], o = [];
            this.setData({
                topicIndex: a,
                resultStatus: !1,
                topic: n,
                errIndex: o,
                fadeClass: ""
            });
        }
    },
    onReady: function() {
        t.initConfig(this.initConfigBack);
    },
    initConfigBack: function() {
        var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null, e = this;
        if (null != t) {
            var a = t.setting, i = t.adv, n = t.mp3;
            a.status && e.setData({
                setting: a.data
            }), e.setData({
                adv: i
            }), this.initAudio(n), e.initInterstitialAd();
        }
    },
    audio: {
        correct: null
    },
    bgPlay: function(t) {
        null != this.audio[t] && this.audio[t].play();
    },
    initAudio: function(t) {
        if ("" != t.correct) {
            var e = wx.createInnerAudioContext();
            e.autoplay = !1, e.src = t.correct, this.audio.correct = e;
        }
    },
    initInterstitialAd: function() {
        if (!1 !== t.canIUseInterstitialAd) {
            var e = this, a = e.data.setting;
            if (0 !== parseInt(a.screen_ad_status) && "" != a.screen_unit_id) {
                var i = null;
                wx.createInterstitialAd && ((i = wx.createInterstitialAd({
                    adUnitId: a.screen_unit_id
                })).onLoad(function() {
                    console.log("onLoad event emit");
                }), i.onError(function(t) {
                    e.setData({
                        canIUseInterstitialAd: !1
                    }), console.log("onError event emit", t);
                }), i.onClose(function(t) {
                    console.log("onClose event emit", t);
                })), e.setData({
                    interstitialAd: i
                });
            }
        }
    },
    showInterstitialAd: function() {
        var t = this, e = this.data.interstitialAd;
        null != e && e.show().catch(function(e) {
            t.setData({
                canIUseInterstitialAd: !1
            });
        });
    },
    initUser: function() {
        this.setData({
            userInfo: t.user
        });
    },
    openByRewardNo: function() {
        var e = this, a = this.data.redbag;
        "" != a.kkid && t.util.request({
            url: "entry/wxapp/receive",
            method: "POST",
            data: {
                kkid: a.kkid
            },
            success: function(i) {
                0 === i.data.code ? (a.openStatus = !0, a = Object.assign(a, i.data.data.redbag), 
                e.setData({
                    redbag: a
                }), t.refreshUser = !0) : t.sad(i.data.message);
            },
            fail: function(t) {
                console.log("receive fail");
            }
        });
    },
    closeRedbag: function() {
        var t = this.getEmptyRedbag();
        this.setData({
            redbag: t
        });
    },
    onShow: function() {
        console.log("detail onshow"), this.setData({
            userInfo: t.user,
            canIUseInterstitialAd: t.canIUseInterstitialAd
        });
    },
    goWxApp: function(t) {
        console.log(t);
        var e = t.currentTarget.dataset.index, a = this.data.adv.data[e];
        wx.navigateToMiniProgram({
            appId: a.appid,
            path: a.path,
            success: function(t) {}
        });
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function(e) {
        var a = t.getShareByScene(this.data.shareScene), i = this.data.userInfo, n = "?from=" + this.data.shareScene;
        return "1" == i.status && (n += "&vid=" + i.id), {
            title: a.title,
            path: t.pages.index + n,
            imageUrl: a.imageUrl,
            success: function(t) {},
            fail: function(t) {},
            complete: function() {}
        };
    }
});