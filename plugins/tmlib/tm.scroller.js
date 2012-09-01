/**
 * phi
 */


var tm = {};

            
tm.$id     = function(id) { return document.getElementById(id); };
tm.$query  = function(q) { return document.querySelector(q); };
tm.$queryAll   = function(q) { return document.querySelectorAll(q); };



if (!Math.leap){
    Math.leap = function(v0, v1, amount) {
        return v0 + (v1-v0)*amount;
    };
}

(function(np){
    
    var Scroller = tm.Scroller = {
        timerID: 0
    };
    
    /**
     * 補間関数群
     */
    // Interpolator
    //  interpolat
    Scroller.interpolation = {
        linear: function(t) {
            return t;
        },
        
        swing: function(t) {
            return (-Math.cos(t*Math.PI)/2) + 0.5;
        },
        
        test: function(t) {
            return Math.sin(Math.PI/2*t);
        }
    };
    
    Scroller.to = function(param, timer, fn, override)
    {
        timer = timer || 500;
        override = override || true;
        
        if (override == true) {
            if (Scroller.timerID) {
                clearTimeout(Scroller.timerID);
            }
        }
        else {
            if (Scroller.timerID) {
                // console.log("cancel");
                return ;
            }
        }
        
        var pos = null;
        var elm = null;
        
        if (!param)                                 { elm = document.body; }
        else if (param.x && param.y)                { pos = param; }
        else if (typeof arguments[0] == "string")   { elm = tm.$query(arguments[0]); }
        else if (typeof arguments[0] == "object")   { elm = arguments[0]; }
        
        if (elm) {
            pos = {};
            pos.x = elm.offsetLeft;
            pos.y = elm.offsetTop;
        }
        
        // start time
        var start = (new Date()).getTime();
        
        Scroller.timerID = setTimeout(function(){
            var pass = (new Date()).getTime() - start;
            var pass_ratio = pass/timer;    // 0 ~ 1
            
            // var amount = tm.interpolation["linear"](pass_ratio);
            var amount = Scroller.interpolation["swing"](pass_ratio);
            var temp_x = Math.round( Math.leap(window.scrollX, pos.x, amount) ),
                temp_y = Math.round( Math.leap(window.scrollY, pos.y, amount) );
            scrollTo( temp_x, temp_y );
            
            if ( (pass < timer) ) {
                Scroller.timerID = setTimeout(arguments.callee, 10);
            }
            else {
                scrollTo( pos.x, pos.y );
                Scroller.timerID = 0;
                if (fn) fn();
            }
        }, 10);
    };
    
    Scroller.by = function()
    {
        
    };
    
    Scroller.setup = function(elm)
    {
        if (elm) {
            
        }
        else {
            e_list = tm.$queryAll("a");
            for (var i=0; i<e_list.length; ++i) {
                // イベントを登録
                e_list[i].addEventListener("click", function(e) {
                    // ページ内リンクかをチェック
                    var href = this.href;
                    var url = location.href.replace(location.hash, "");
                    if (href.replace(url, "")[0] != '#') return ;
                    
                    // ターゲット
                    var q = this.href.substr( this.href.indexOf('#') );
                    // タイム
                    var time = 1000;
                    for (var i=0; i<this.classList.length; ++i) {
                        var ma = this.classList[i].match(/scroll-time:(\d+)/);
                        if (ma) { time = parseInt( ma[1] ); }
                    }
                    // スクロールする
                    Scroller.to(q, time, function(){
                        // コールバックでハッシュを変更
                        // location.hash=q;
                    });
                    // デフォルトイベントをキャンセル
                    e.preventDefault();
                }, false);
            }
        }
    }
    
})(tm);
















