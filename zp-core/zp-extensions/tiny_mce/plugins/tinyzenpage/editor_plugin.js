(function(){tinymce.PluginManager.requireLangPack('tinyzenpage');tinymce.create('tinymce.plugins.tinyzenpagePlugin',{init:function(ed,url){ed.addCommand('mcetinyzenpage',function(){ed.windowManager.open({file:url+'/tinyzenpage.php',width:800+parseInt(ed.getLang('tinyzenpage.delta_width',0)),height:570+parseInt(ed.getLang('tinyzenpage.delta_height',0)),inline:1},{plugin_url:url,some_custom_arg:'custom arg'});});ed.addButton('tinyzenpage',{title:'tinyzenpage.desc',cmd:'mcetinyzenpage',image:url+'/img/tinyzenpage.gif'});ed.onNodeChange.add(function(ed,cm,n){cm.setActive('tinyzenpage',n.nodeName=='IMG');});},createControl:function(n,cm){return null;},getInfo:function(){return{longname:'tinyzenpage plugin',author:'Malte M�ller (acrylian)',authorurl:'http://www.maltem.de',infourl:'http://zenpage.maltem.de',version:"1.0"};}});tinymce.PluginManager.add('tinyzenpage',tinymce.plugins.tinyzenpagePlugin);})();