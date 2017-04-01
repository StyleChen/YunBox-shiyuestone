<?php //Template Name:Full-Width-contact Page
get_header(); 
 ?>
    <div><img src="http://www.goodwaystone.com/data/template/default/images/ban_contact.jpg" alt="" class="img-responsive"></div>
    <div class="containerSelf">
        <h3 class="text-center" style="margin-bottom: 2rem;"><span style="border-bottom: 1px solid #ddd;padding-bottom: .5rem;">CONTACT US</span></h3>
        <div class="col-md-6">
            <div class="contact-address">
                <h4>Xiamen Shiyue Stone Co.,Ltd</h4>
                <p><i class="icon glyphicon glyphicon-map-marker"></i><span class="left">Address : Qi Shan North Industrial Area,chaoshan Rd,Shantou</span></p>
                <p><i class="icon glyphicon glyphicon-phone"></i><span class="left">Tel : 86-754-88686622</span></p>
                <p><i class="icon glyphicon glyphicon-print"></i><span class="left">Fax : 86-754-88915444</span></p>
                <p><i class="icon glyphicon glyphicon-headphones"></i><span class="left">Mobile Phone : 13829662202</span></p>
            </div>
        </div>
        <div class="col-md-6">
            <div id="contact-map">

            </div>
        </div>
        <form action="#" class="form">
            <div class="col-md-6"><input type="text" placeholder="Title"></div>
            <div class="col-md-6"><input type="text" placeholder="Name"></div>
            <div class="col-md-6"><input type="text" placeholder="Email"></div>
            <div class="col-md-6"><input type="text" placeholder="Phone"></div>
            <div class="col-md-12"><textarea name="shiyue" id="shiyuetext" placeholder="content"></textarea></div>
            <div class="col-md-12"><button type="submit" class="submitSend">send</button></div>
        </form>
    </div>
    <script type="text/javascript">
        // 百度地图API功能
        var map = new BMap.Map("contact-map");    // 创建Map实例
        map.centerAndZoom(new BMap.Point(118.104285,24.520005), 15);  // 初始化地图,设置中心点坐标和地图级别  厦门市湖里区悦华路4中航·凯迪克凯吉楼5层
        map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
        map.setCurrentCity("厦门");          // 设置地图显示的城市 此项是必须设置的
        map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
        var marker = new BMap.Marker(new BMap.Point(118.104285,24.520005)); // 创建点
        map.addOverlay(marker);//增加点
    </script>

<?php get_footer(); ?>