var e = getApp();

Page({
    data: {
        icons: {
            fans: "/wei_idiom/resource/icon/invite/fans.png",
            more: "/wei_idiom/resource/icon/invite/more.png"
        },
        emptyList: [ 1, 2, 3, 4, 5, 6 ],
        inviteList: [],
        userInfo: e.user,
        setting: {
            unit_id: "",
            per_video_gold: "",
            per_invite_gold: 0
        },
        showVideoAdButton: !1,
        rewardedVideoAd: null,
        shareScene: "invite"
    },
    onLoad: function(t) {
        this.loadMyInviteList(), e.initConfig(this.initConfigBack);
    },
    loadMyInviteList: function() {
        var t = this;
        e.util.request({
            url: "entry/wxapp/myinvite",
            showLoading: !1,
            success: function(e) {
                var i = e.data.data.list, n = t.data.emptyList;
                i.length > 0 && n.splice(0, i.length), t.setData({
                    inviteList: i,
                    emptyList: n
                });
            },
            fail: function(e) {
                console.log("check fail");
            }
        });
    },
    onReady: function() {},
    initConfigBack: function() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null, t = this;
        if (null != e) {
            var i = e.setting;
            i.status && t.setData({
                setting: i.data
            }), t.initRewardVideoAd();
        }
    },
    initRewardVideoAd: function() {
        if (!1 !== e.canIUseRewardedVideoAd) {
            var t = this, i = t.data.setting;
            if (0 !== parseInt(i.video_ad_status) && "" != i.video_unit_id) {
                var n = null;
                wx.createRewardedVideoAd && ((n = wx.createRewardedVideoAd({
                    adUnitId: i.video_unit_id
                })).onLoad(function() {
                    t.setData({
                        showVideoAdButton: !0
                    });
                }), n.onError(function(e) {
                    console.log(e), t.setData({
                        showVideoAdButton: !1
                    });
                }), n.onClose(function(e) {
                    e && e.isEnded && t.sendVideoReward();
                })), t.setData({
                    rewardedVideoAd: n
                });
            }
        }
    },
    code: "",
    sendVideoReward: function() {
        var t = this;
        e.util.request({
            url: "entry/wxapp/sendReward",
            data: {
                v: e.av,
                code: t.code
            },
            showLoading: !1,
            success: function(i) {
                0 === i.data.code ? (t.setData({
                    showVideoAdButton: i.data.data.show_video
                }), e.updateUserGold(t.data.setting.per_video_gold, "+", t.onShow), e.happy("金币 + " + t.data.setting.per_video_gold), 
                setTimeout(function() {
                    i.data.data.show_video || (e.updateConfig = !0);
                }, 500)) : e.sad(i.data.message);
            },
            fail: function(e) {
                console.log("check fail");
            }
        });
    },
    showRewardVideoAd: function() {
        var e = this, t = this.data.rewardedVideoAd;
        null != t && (wx.login({
            success: function(t) {
                e.code = t.code;
            },
            fail: function() {
                console.log("wx.login失败");
            }
        }), t.show().then(function() {
            console.log("广告开始显示");
        }).catch(function() {
            t.load().then(function() {
                return t.show().then(function() {
                    console.log("广告重新拉取成功");
                });
            }).catch(function(t) {
                e.setData({
                    showVideoAdButton: !1
                });
            });
        }));
    },
    onShow: function() {
        console.log("invite show"), this.setData({
            userInfo: e.user
        });
    },
    onShareAppMessage: function() {
        var t = e.getShareByScene(this.data.shareScene), i = this.data.userInfo, n = "?from=" + this.data.shareScene;
        return "1" == i.status && (n += "&vid=" + i.id), {
            title: t.title,
            path: e.pages.index + n,
            imageUrl: t.imageUrl,
            success: function(e) {},
            fail: function(e) {},
            complete: function() {}
        };
    }
});