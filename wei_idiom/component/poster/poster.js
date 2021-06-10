Component({
    properties: {
        posterFile: String
    },
    data: {
        posterSrc: "https://we7-wxapp.oss-cn-beijing.aliyuncs.com/wxapp/wei_mxph/bgimg/poster.png",
        cancelText: "取消",
        mleft: 0,
        mtop: 0,
        imgW: 0,
        imgH: 0,
        icons: {
            close: "/wei_mxph/resource/icon/detail/poster/close.png",
            download: "/wei_mxph/resource/icon/detail/poster/down.png"
        },
        iconW: 0
    },
    attached: function() {
        var t = wx.getSystemInfoSync(), i = t.windowWidth / 375, e = 592, o = 996;
        t.windowWidth > 375 && (o = (e /= i) / 592 * 996);
        var n = e / 10, c = (750 - e) / 2, s = (2 * t.windowHeight / i - o) / 3;
        t.windowHeight < 603 && t.windowWidth < 375 && (e = 592, o *= i), this.setData({
            mleft: c,
            mtop: s,
            imgW: e,
            imgH: o,
            iconW: n
        });
    },
    methods: {
        _click: function(t) {
            var i = t.currentTarget.dataset.action;
            this.triggerEvent("posterAction", {
                action: i
            });
        }
    }
});