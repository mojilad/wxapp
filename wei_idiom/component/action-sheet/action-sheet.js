Component({
    properties: {
        myProperty: String
    },
    data: {
        cancelText: "取消"
    },
    methods: {
        _click: function(t) {
            var e = t.currentTarget.dataset.action;
            this.triggerEvent("clickAction", {
                action: e
            });
        }
    }
});