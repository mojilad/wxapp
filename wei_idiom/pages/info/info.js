var e = getApp();

Page({
    data: {
        fillCompleted: !1,
        info: {
            realname: "",
            mobile: "",
            wxid: ""
        }
    },
    onShow: function() {
        this.initInfo();
    },
    onLoad: function(e) {},
    initInfo: function() {
        var i = this.data.info;
        Object.keys(e.user).length > 6 && (i.realname = e.user.realname, i.mobile = e.user.mobile, 
        i.wxid = e.user.wxid, this.setData({
            info: i
        }));
    },
    onReady: function() {},
    isMobileAvailable: function(e) {
        return !!/^[1][3,4,5,6,7,8,9][0-9]{9}$/.test(e);
    },
    infoInput: function(i) {
        var t = this.data.info, a = i.target.dataset.key;
        "mobile" != a || 11 != i.detail.value.length || this.isMobileAvailable(i.detail.value) ? (t[a] = i.detail.value, 
        this.setData({
            info: t
        }), this.isCompletelyInput()) : e.sad("手机号非法");
    },
    isCompletelyInput: function() {
        var e = this, i = this.data.info;
        "" != i.realname && "" != i.mobile && "" != i.wxid && this.isMobileAvailable(i.mobile) ? e.setData({
            fillCompleted: !0
        }) : e.setData({
            fillCompleted: !1
        });
    },
    doSave: function() {
        if (0 != this.data.fillCompleted) {
            var i = this.data.info;
            this.isMobileAvailable(i.mobile) ? e.util.request({
                url: "entry/wxapp/info",
                data: i,
                method: "POST",
                success: function(i) {
                    0 === i.data.code && (e.user = i.data.data, e.happy("保存成功"));
                },
                fail: function(e) {
                    console.log("fail");
                }
            }) : e.sad("手机号非法");
        } else e.sad("信息不完整");
    }
});