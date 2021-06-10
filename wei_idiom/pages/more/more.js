var t = getApp();

Page({
    data: {
        userInfo: t.user,
        adv_list: [],
        config: null,
        setting: {},
        gzh_box_status: !1,
        canIUseInterstitialAd: t.canIUseInterstitialAd,
        interstitialAd: null
    },
    onLoad: function(n) {
        var a = this;
        console.log(t.config), null != t.config && this.setData({
            userInfo: t.user,
            setting: t.config.setting.data
        }), a.loadTasks(), a.initInterstitialAd();
    },
    loadTasks: function() {
        var n = this;
        t.util.request({
            showLoading: !1,
            data: {
                op: "adv_list"
            },
            url: "entry/wxapp/adv",
            success: function(t) {
                0 === t.data.code && n.setData({
                    adv_list: t.data.data
                });
            }
        });
    },
    goSee: function(t) {
        var n = t.currentTarget.dataset.index, a = this.data.adv_list[n];
        wx.navigateToMiniProgram({
            appId: a.appid,
            path: a.path,
            success: function(t) {}
        });
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
    onReady: function() {},
    onShow: function() {},
    initInterstitialAd: function() {
        if (!1 !== t.canIUseInterstitialAd) {
            var n = this, a = n.data.setting;
            if (0 !== parseInt(a.screen_ad_status) && "" != a.screen_unit_id) {
                var i = null;
                wx.createInterstitialAd && ((i = wx.createInterstitialAd({
                    adUnitId: a.screen_unit_id
                })).onLoad(function() {
                    console.log("onLoad event emit");
                }), i.onError(function(t) {
                    n.setData({
                        canIUseInterstitialAd: !1
                    }), console.log("onError event emit", t);
                }), i.onClose(function(t) {
                    console.log("onClose event emit", t);
                })), n.setData({
                    interstitialAd: i
                }), n.showInterstitialAd();
            }
        }
    },
    showInterstitialAd: function() {
        var t = this, n = this.data.interstitialAd;
        null != n && n.show().catch(function(n) {
            t.setData({
                canIUseInterstitialAd: !1
            });
        });
    }
});