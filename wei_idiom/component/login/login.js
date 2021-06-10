Component({
    properties: {},
    data: {},
    methods: {
        componentCancel: function() {
            this.triggerEvent("cancel");
        },
        componentLogin: function(t) {
            var that=this
            wx.getUserProfile({
                lang: "zh_CN",
                desc: "获取头像",
                success: function (a) {
                    that.triggerEvent("confirm", {
                        result:a
                    });              
                },
                fail: function (s) {
                  console.log(s.errMsg)
                  wx.showToast({
                    title: "请点击允许授权登录！",
                    icon: "none",
                    duration: 3000
                  });
                }
              });
            
        }
    }
});