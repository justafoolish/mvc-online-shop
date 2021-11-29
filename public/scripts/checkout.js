$.getJSON('./script/tinhthanh.json', function (json) {
    var tinhthanh = [];
    for (var key in json) {
        if (json.hasOwnProperty(key)) {
            var item = json[key];
            tinhthanh.push({
                name: item.name,
                code: item.code
            });            
        }
    }
    });