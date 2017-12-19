function map_init(lng1,lat1,lng2,lat2) {    
            
   
    var markerArr = [    
        { title: "当前位置", point: lng1+","+lat1, address: "当前位置" },    
        { title: "目标位置", point: lng2+","+lat2, address: "目标位置" }
    ]; 



    var map = new BMap.Map("map"); // 创建Map实例    
    var point = new BMap.Point(lng1,lat1); //地图中心点，广州市    
    map.centerAndZoom(point, 15); // 初始化地图,设置中心点坐标和地图级别。    
    map.enableScrollWheelZoom(true); //启用滚轮放大缩小    
    //向地图中添加缩放控件    
    var ctrlNav = new window.BMap.NavigationControl({    
        anchor: BMAP_ANCHOR_TOP_LEFT,    
        type: BMAP_NAVIGATION_CONTROL_LARGE    
    });    
    map.addControl(ctrlNav);    

    //向地图中添加缩略图控件    
   

    //向地图中添加比例尺控件    
    var ctrlSca = new window.BMap.ScaleControl({    
        anchor: BMAP_ANCHOR_BOTTOM_LEFT    
    });    
    map.addControl(ctrlSca);    

    var point = new Array(); //存放标注点经纬信息的数组    
    var marker = new Array(); //存放标注点对象的数组    
    var info = new Array(); //存放提示信息窗口对象的数组    
    for (var i = 0; i < markerArr.length; i++) {    
        var p0 = markerArr[i].point.split(",")[0]; //    
        var p1 = markerArr[i].point.split(",")[1]; //按照原数组的point格式将地图点坐标的经纬度分别提出来    
        point[i] = new window.BMap.Point(p0, p1); //循环生成新的地图点    
        marker[i] = new window.BMap.Marker(point[i]); //按照地图点坐标生成标记    
        map.addOverlay(marker[i]);    
        marker[i].setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画    
        var label = new window.BMap.Label(markerArr[i].title, { offset: new window.BMap.Size(20, -10) });    
        marker[i].setLabel(label);    
      
    }    
   
}    