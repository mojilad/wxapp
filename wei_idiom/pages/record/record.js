var t = getApp();

Page({
    data: {
        recordList: [],
        setting: {
            kf_wxid: ""
        }
    },
    contractKF: function() {
        var i = this.data.setting;
        "" != i.kf_wxid ? wx.setClipboardData({
            data: i.kf_wxid,
            success: function(t) {
                wx.showModal({
                    title: "温馨提示",
                    content: "微信号复制成功，请添加客服微信，审核您的兑换记录",
                    confirmText: "我知道了",
                    confirmColor: "#fd5757",
                    success: function(t) {}
                });
            }
        }) : t.sad("未设置微信号");
    },
    onLoad: function(t) {
        this.getRecordList();
    },
    getRecordList: function() {
        var i = this;
        t.util.request({
            url: "entry/wxapp/record",
            success: function(t) {
                i.setData({
                    recordList: t.data.data
                });
            },
            fail: function(t) {
                console.log("获取兑换记录：fail");
            }
        });
    },
    onReady: function() {
        t.initConfig(this.initConfigBack);
    },
    initConfigBack: function() {
        var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null, i = this;
        if (null != t) {
            var n = t.setting;
            n.status && i.setData({
                setting: n.data
            });
        }
    },
    onShow: function() {},
    onHide: function() {}
});