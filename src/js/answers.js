window.App = {
    multiplyWithoutAsterisk: function (a, b) {
        var sum = 0;
        for (var i = 0;i < b;i++) {
            sum += a;
        }
        return sum;
    },
    multiplyWithoutAsteriskRecursion: function (a, b) {
        var self = this;
        if (b == 0) {
            return 0;
        }
        return a + self.multiplyWithoutAsteriskRecursion(a, --b);
    }
};
