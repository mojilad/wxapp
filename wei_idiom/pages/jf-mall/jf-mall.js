var t = getApp();

Page({
    data: {
        goodList: [],
        unit_id: "",
        setting: {
            unit_id: "",
            kf_wxid: ""
        },
        loginCompStatus: !1
    },
    onLoad: function(i) {
        t.unit_id && this.setData({
            unit_id: t.unit_id
        }), this.initGoods();
    },
    copyKfWx: function() {
        var t = this.data.setting;
        "" != t.kf_wxid && wx.setClipboardData({
            data: t.kf_wxid,
            success: function(t) {
                wx.showModal({
                    title: "复制成功",
                    content: "客服微信号复制成功，请添加微信，审核您的历史兑换",
                    confirmText: "我知道了",
                    confirmColor: "#fd5757",
                    success: function(t) {}
                });
            }
        });
    },
    initGoods: function() {
        var i = this;
        t.util.request({
            url: "entry/wxapp/goods",
            success: function(t) {
                i.setData({
                    goodList: t.data.data
                });
            },
            fail: function(t) {
                console.log("请求积分商品:fail");
            }
        });
    },
    returnPrev: function() {
        wx.navigateBack();
    },
    goInfo: function() {
        t.registerStatus ? wx.navigateTo({
            url: t.pages.info
        }) : this.showLoginModal();
    },
    goRecord: function() {
        t.registerStatus ? wx.navigateTo({
            url: t.pages.record
        }) : this.showLoginModal();
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
    pgLoginConfirm: function(i) {
        var o = i.detail.result, n = this;
        if (o.userInfo) {
            var a = o.userInfo;
            a.vid = n.data.vid, t.register(a, n.loginCallback), n.setData({
                loginCompStatus: !1
            });
        } else console.log("用户未允许授权");
    },
    doExchange: function(i) {
        if (t.registerStatus) {
            var o = t.user;
            if ("" != o.realname && "" != o.mobile && "" != o.wxid) {
                var n = this, a = i.currentTarget.dataset.index, s = this.data.goodList[a], e = i.detail.formId;
                wx.showModal({
                    title: "兑换确认",
                    content: "您确定要使用 " + s.price + " 元来兑换这个商品吗",
                    cancelText: "考虑一下",
                    confirmText: "立即兑换",
                    confirmColor: "#5735B7",
                    success: function(i) {
                        i.confirm && t.util.request({
                            url: "entry/wxapp/exchange",
                            data: {
                                form_id: e,
                                goods_id: s.id
                            },
                            success: function(i) {
                                if (0 == i.data.code) return n.initGoods(), t.refreshUser = !0, void t.happy("兑换成功");
                                t.sad(i.data.message);
                            },
                            fail: function(t) {
                                console.log("请求积分商品:fail");
                            }
                        });
                    }
                });
            } else t.sad("请先完善信息");
        } else this.showLoginModal();
    },
    onReady: function() {
        t.initConfig(this.initConfigBack);
    },
    initConfigBack: function() {
        var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null, i = this;
        if (null != t) {
            var o = t.setting;
            o.status && i.setData({
                setting: o.data
            });
        }
    },
    onShow: function() {}
});