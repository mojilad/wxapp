var n = getApp();

Page({
    data: {
        icons: {
            list: "/wei_idiom/resource/icon/question/list.png",
            list_expand: "/wei_idiom/resource/icon/question/list_expand.png"
        },
        setting: {},
        ex_idx: -1,
        qa_list: [ {
            q: "成语小程序怎么玩",
            a: "您可以点击首页「开始猜成语」，找出正确答案，既能学习知识又能赚钱"
        }, {
            q: "为什么提示我的金币不足",
            a: "亲，猜成语需要消耗金币哦，您可以通过邀请好友，或者看激励视频获取金币"
        }, {
            q: "猜成语奖励是什么",
            a: "亲，您随机获得的奖励，可用于兑换商品哦"
        }, {
            q: "商品兑换后如何发货",
            a: "从首页进入「兑换」页面，点击复制客服微信，添加咨询哦"
        }, {
            q: "这个小程序收费吗",
            a: "不会的，这是一款免费的猜成语小程序，供您休闲娱乐、益智消遣使用"
        }, {
            q: "还有别的好玩的程序推荐吗",
            a: "点击首页「更多好玩」，会有其他好玩的程序哦"
        } ]
    },
    onLoad: function(t) {
        null != n.config && this.setData({
            setting: n.config.setting.data
        });
    },
    selItem: function(n) {
        var t = n.currentTarget.dataset.index, i = this.data.ex_idx;
        this.setData({
            ex_idx: t === i ? -1 : t
        });
    },
    back: function() {
        wx.navigateBack({
            delta: 1
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});