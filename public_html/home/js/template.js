/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

(function ($) {
    $(document).ready(function () {




        $("#footer .back-top").click(function () {
            $("html, body").animate({scrollTop: 0}, 1000);
        });


        $('#mmenu').click(function(e){
            e.stopPropagation();
            $('body').addClass('out');
        })
        $('#sidemenu > div span.close').click(function(){
            $('body').addClass('out2');
            setTimeout(function(){
                $('body').removeClass('out');
                $('body').removeClass('out2');

            }, 800);
        })
        $('#sidemenu > div').click(function(e){
            e.stopPropagation();
        })



        $('body').click(function(){
            $('body').addClass('out2');
            setTimeout(function(){
                $('body').removeClass('out');
                $('body').removeClass('out2');

            }, 800);
        })

        if($('#smenu').length ){
            $('#smenu li').each(function(){
                if($(this).children('ul').length){
                    $(this).append("<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-chevron-down' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><polyline points='6 9 12 15 18 9' /></svg>")
                }
            })
        }

        if($('#smenu2').length ){
            $('#smenu2 li').each(function(){
                if($(this).children('ul').length){
                    $(this).append("<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-chevron-down' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><polyline points='6 9 12 15 18 9' /></svg>")
                }
            })
        }

        $('#smenu > ul > li a').click(function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).parent().find('ul').slideUp();
                $(this).parent().find('i').removeClass('active');
            }else{
                $(this).addClass('active');
                $(this).siblings('ul').slideDown();

            }
        })

        $('#smenu2 > ul > li a.has_child').click(function(e){
            e.preventDefault();
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).parent().find('ul').slideUp();
                $(this).parent().find('i').removeClass('active');
            }else{
                $(this).addClass('active');
                $(this).siblings('ul').slideDown();

            }
        })


        $('#filters input[type="checkbox"]').each(function(){


            $(this).on('change', function(){    // 2nd (A)
                if($(this).is(":checked")){
                    var a= $(this).data('filter');
                    var b= $(this).attr('id');
                    var c= "<li class='"+b+"'><span class='remove'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-x' width='10' height='10' viewBox='0 0 24 24' stroke-width='3' stroke='#fff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='18' y1='6' x2='6' y2='18' /><line x1='6' y1='6' x2='18' y2='18' /></svg></span><span class='text'>"+a+"</span></li>";
                    $('#filters .applied-filters ul').append(c);
                }else{
                    var b= $(this).attr('id');
                    $('#filters .applied-filters ul li.'+b).remove();
                }
            });


        })

// $('#filters input[type="radio"]').each(function(){


//     $(this).on('change', function(){    // 2nd (A)
//         if($(this).is(":checked")){
//         var a= $(this).data('filter');
//         var b= $(this).attr('id');
//         var c= "<li class='"+b+"'><span class='remove'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-x' width='10' height='10' viewBox='0 0 24 24' stroke-width='3' stroke='#fff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='18' y1='6' x2='6' y2='18' /><line x1='6' y1='6' x2='18' y2='18' /></svg></span><span class='text'>"+a+"</span></li>";
//         $('#filters .applied-filters ul').append(c);
//         }else{
//         var b= $(this).attr('id');
//         $('#filters .applied-filters ul li.'+b).remove();
//         }
//     });


// })



        $('#filters input[type="radio"]').bind('click', function(){
            // Processing only those that match the name attribute of the currently clicked button...
            $('input[name="' + $(this).attr('name') + '"]').not($(this)).trigger('deselect'); // Every member of the current radio group except the clicked one...
            var a= $(this).data('filter');
            var b= $(this).attr('id');
            var c= "<li class='"+b+"'><span class='remove'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-x' width='10' height='10' viewBox='0 0 24 24' stroke-width='3' stroke='#fff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='18' y1='6' x2='6' y2='18' /><line x1='6' y1='6' x2='18' y2='18' /></svg></span><span class='text'>"+a+"</span></li>";
            $('#filters .applied-filters ul').append(c);
        });

        $('#filters input[type="radio"]').bind('deselect', function(){
            var b= $(this).attr('id');
            $('#filters .applied-filters ul li.'+b).remove();
        })



        $('#filters input[type="text"]').each(function(){

            $(this).on("keyup", function() {
                var a= $(this).parents('.search-op').siblings().find('li');
                console.log(a);
                var value = $(this).val().toLowerCase();
                a.filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });


        });




        if($('#priceslider').length){

            var priceslid = document.getElementById('priceslider');

            var minprice = $('#priceslider').data('min');
            var maxprice = $('#priceslider').data('max');
            var start = $('#amount1').val();
            var end = $('#amount2').val();
            noUiSlider.create(priceslid, {
                start: [start, end],
                step: 1,
                direction: 'rtl',
                connect: true,
                range: {
                    'min': minprice,
                    'max': maxprice
                }

            }).on('set.end', function () {

                $('#s1').submit()
            });;
// var inputNumber = document.getElementById('input-number');
            priceslid.noUiSlider.on('update', function (values, handle) {
                var value = $.number( values[handle] );
                if (handle) {
                    $('.price-values .max .num').text(value);
                    var c= "<li class='max'><span class='remove'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-x' width='10' height='10' viewBox='0 0 24 24' stroke-width='3' stroke='#fff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='18' y1='6' x2='6' y2='18' /><line x1='6' y1='6' x2='18' y2='18' /></svg></span><span class='text'>حداکثر قیمت "+value +" تومان</span></li>";

                    if($('#filters .applied-filters ul li.max').length){
                        $('#filters .applied-filters ul li.max .text').text("حداکثر قیمت "+value +" تومان")
                    }else{
                        $('#filters .applied-filters ul').append(c);
                    }
                    value= value.replace(/,/g, '')
                    console.log(value)
                    $('#amount2').val(value)
                } else {
                    $('.price-values .min .num').text(value);
                    var c= "<li class='min'><span class='remove'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-x' width='10' height='10' viewBox='0 0 24 24' stroke-width='3' stroke='#fff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='18' y1='6' x2='6' y2='18' /><line x1='6' y1='6' x2='18' y2='18' /></svg></span><span class='text'>حداقل قیمت "+value +" تومان</span></li>";

                    if($('#filters .applied-filters ul li.min').length){
                        $('#filters .applied-filters ul li.min .text').text("حداقل قیمت "+value +" تومان")
                    }else{
                        $('#filters .applied-filters ul').append(c);
                    }
                    value= value.replace(/,/g, '')
                    console.log(value)
                    $('#amount1').val(value)

                }


            });

        }




        $('body').on('click', '#filters .applied-filters ul li span.remove', function() {
            var a= $(this).parent().attr('class');
            console.log(a)
            if(a=='min'){
                priceslid.noUiSlider.set([minprice, null]);
            }else if(a=='max'){
                priceslid.noUiSlider.set([null, maxprice]);

            }else{
                $(this).parent().remove();
                $('#filters #'+a).removeAttr("checked");
            }
        })

        $('#filters .drop-filter .drop-value').click(function(){
            $(this).parent().toggleClass('active').siblings().removeClass('active');
        })



        $('body').click(function(){
            $('#filters .drop-filter').removeClass('active');
        })
        $('#filters .drop-filter').click(function(e){
            e.stopPropagation();
        })





        if($( ".js-player" ).length){
            const players = Array.from(document.querySelectorAll('.js-player')).map(p => new Plyr(p));

        }




        $('.tab-nav li').click(function(){
            var a= $(this).index();
            var b= $(this).parent().parent().siblings('.tab-container');
            $(this).addClass('active').siblings().removeClass('active');
            console.log(b);
            b.each(function(){
                $(this).children('ul').children('li').eq(a).addClass('active').siblings().removeClass('active');

            })
        })



        $('.user-set-pop-side ul li').click(function(){
            var a= $(this).index();
            var b= $(this).parent().parent().siblings('.user-set-pop-content');
            $(this).addClass('active').siblings().removeClass('active');
            console.log(b);
            b.each(function(){
                $(this).children('ul').children('li').eq(a).addClass('active').siblings().removeClass('active');

            })
        })



        if($( ".comment-list ul" ).length){

            $('.comment-list ul').owlCarousel({
                loop:true,
                margin:28,
                rtl: true,
                nav:true,
                autoplay:true,
                autoplaySpeed:1400,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
                navText : ["<svg width='27' height='19' viewBox='0 0 27 19' fill='none' xmlns='http://www.w3.org/2000/svg'><path opacity='1' d='M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z' fill='currentColor'/></svg>","<svg width='27' height='19' viewBox='0 0 27 19' fill='none' xmlns='http://www.w3.org/2000/svg'><path opacity='1' d='M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z' fill='currentColor'/></svg>"],
                responsive:{
                    0:{
                        items:1
                    },
                    1000:{
                        center: false,
                        items:2
                    },
                    1500:{
                        items:2
                    }
                }
            })

        }



        if($( ".home-blog" ).length){

            $('.home-blog').owlCarousel({
                loop:true,
                margin:28,
                rtl: true,
                nav:true,
                autoplay:true,
                autoplaySpeed:1400,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
                navText : ["<svg width='27' height='19' viewBox='0 0 27 19' fill='none' xmlns='http://www.w3.org/2000/svg'><path opacity='1' d='M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z' fill='currentColor'/></svg>","<svg width='27' height='19' viewBox='0 0 27 19' fill='none' xmlns='http://www.w3.org/2000/svg'><path opacity='1' d='M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z' fill='currentColor'/></svg>"],
                responsive:{
                    0:{
                        items:1
                    },
                    1000:{
                        items:2
                    },
                    1200:{
                        items:3
                    },
                    1500:{
                        items:4
                    }
                }
            })

        }


        if($( ".related-post" ).length){

            $('.related-post').owlCarousel({
                loop:true,
                margin:28,
                rtl: true,
                nav:true,
                autoplay:true,
                autoplaySpeed:1400,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
                navText : ["<svg width='27' height='19' viewBox='0 0 27 19' fill='none' xmlns='http://www.w3.org/2000/svg'><path opacity='1' d='M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z' fill='currentColor'/></svg>","<svg width='27' height='19' viewBox='0 0 27 19' fill='none' xmlns='http://www.w3.org/2000/svg'><path opacity='1' d='M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z' fill='currentColor'/></svg>"],
                responsive:{
                    0:{
                        items:1
                    },
                    1000:{
                        items:2
                    },
                    1300:{
                        items:2
                    },
                    1500:{
                        items:2
                    }
                }
            })

        }

        if($( ".confirmed-list" ).length){

            $('.confirmed-list').owlCarousel({
                loop:true,
                margin:28,
                rtl: true,
                nav:true,
                autoplay:true,
                autoplaySpeed:1400,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
                navText : ["<svg width='27' height='19' viewBox='0 0 27 19' fill='none' xmlns='http://www.w3.org/2000/svg'><path opacity='1' d='M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z' fill='currentColor'/></svg>","<svg width='27' height='19' viewBox='0 0 27 19' fill='none' xmlns='http://www.w3.org/2000/svg'><path opacity='1' d='M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z' fill='currentColor'/></svg>"],
                responsive:{
                    0:{
                        items:1
                    },
                    1000:{
                        items:2
                    },
                    1200:{
                        items:3
                    },
                    1500:{
                        items:4
                    }
                }
            })

        }

        if($( ".home-comment-list" ).length){

            $('.home-comment-list').owlCarousel({
                loop:true,
                margin:28,
                rtl: true,
                nav:true,
                autoplay:false,
                autoplaySpeed:1400,
                items:1,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
                navText : ["<svg width='27' height='19' viewBox='0 0 27 19' fill='none' xmlns='http://www.w3.org/2000/svg'><path opacity='1' d='M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z' fill='currentColor'/></svg>","<svg width='27' height='19' viewBox='0 0 27 19' fill='none' xmlns='http://www.w3.org/2000/svg'><path opacity='1' d='M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z' fill='currentColor'/></svg>"]

            })

        }




        // if($( "#teacher-clander .conسسd ul" ).length){
        //     $('#teacher-clander .cond ul').lightSlider({
        //         item:7,
        //         rtl:true,
        //         loop:false,
        //         enableTouch:false,
        //         enableDrag:false,
        //         pager:false,
        //         slideMove:7,
        //         easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        //         speed:600,
        //         responsive : [
        //             {
        //                 breakpoint:1000,
        //                 settings: {
        //                     item:5,
        //                     slideMove:5,
        //                     slideMargin:6,
        //                 }
        //             },
        //             {
        //                 breakpoint:600,
        //                 settings: {
        //                     item:3,
        //                     slideMove:3,
        //                     slideMargin:6,
        //                 }
        //             }
        //         ]
        //     });
        //
        // }
        if($( "#teacher-clander .con ul" ).length){

            $('#teacher-clander .con ul').lightSlider({
                item:7,
                rtl:true,
                loop:false,
                enableTouch:false,
                enableDrag:false,
                pager:false,
                slideMove:7,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                speed:600,
                responsive : [
                    {
                        breakpoint:1000,
                        settings: {
                            item:5,
                            slideMove:5,
                            slideMargin:6,
                        }
                    },
                    {
                        breakpoint:600,
                        settings: {
                            item:3,
                            slideMove:3,
                            slideMargin:6,
                        }
                    }
                ]
            });


        }




        var ad ;
        var bd ;
        var el ;

        $('#teacher-clander').mouseleave(function(){
            $('#teacher-clander .resbox').remove();
            $('#teacher-clander .con ul li .buto').remove();
            $('#teacher-clander .con ul li .act').removeClass('act');

        })
        $('#teacher-clander .con ul li .hour').mouseenter(function(){
            $('#teacher-clander  .resbox').remove();
            $('#teacher-clander .con ul li .buto').remove();
            $('#teacher-clander .con ul li .act').removeClass('act');

        })

        // $('#teacher-clander .con ul li .hour.open').mouseenter(function(){
        //     // if ($(this).data('level')!='student'){
        //     //     return
        //     // }
        //     el=$(this)
        //     var btid= 'start_reserve';
        //     if ($('#res_student').length){
        //         btid='student_reserve'
        //     }
        //     ad= $(this).next();
        //     bd= $(this).prev();
        //     var c= $(this).data('time');
        //     var id= $(this).data('id');
        //     var date= $(this).data('da');
        //     var time= $(this).data('time');
        //     console.log(time)
        //     var class_id= $(this).data('cid')
        //     var w= $(this).width();
        //     var ml= -(274-w)/2;
        //     var parent= $(this).parents('#teacher-clander');
        //     var totop= $(this).offset().top-parent.offset().top-310;
        //     var toleft= $(this).offset().left-parent.offset().left;
        //     var day= $(this).parent('li').data('date');
        //     var img= parent.data('pic');
        //     var name= parent.data('name');
        //     var lang= parent.data('lang');
        //     var flag= parent.data('flag');
        //     if(ad.hasClass('open')){
        //         var ftime= $(this).data('time');
        //         var ltime= ad.next().data('time');
        //
        //     }else if(bd.hasClass('open')){
        //         var ftime= bd.data('time');
        //         var ltime= ad.data('time');
        //     }
        //     var d='<div class="resbox" style="top:'+totop+'px; margin-left:'+ml+'px; left:'+toleft+'px;">'+
        //         '<div class="ma">'+
        //         '<div class="top">'+
        //         '<div class="rightl">'+
        //         '<div class="img" style="background:url('+img+');" >'+
        //         '</div>'+
        //         '</div>'+
        //         '<div class="leftl">'+
        //         '<span class="title">'+name+'</span>'+
        //         '<span class="bot"><img src='+flag+' alt="">'+lang+'</span>'+
        //         '</div>'+
        //         '</div>'+
        //         '<div class="date">'+
        //         '<ul>'+
        //         '<li><span>تاریخ :</span><span class="vla">'+day+'</span></li>'+
        //         '<li><span> زمان :</span><span class="vla">'+ftime+ '</span><span class="vla">-</span><span class="vla">' + ltime+'</span></li>'+
        //         '</ul>'+
        //         '</div>'+
        //         '<div class="but">'+
        //         ' <span id="'+btid+'" data-id="'+id+'" data-date="'+date+'" data-time="'+time+'" data-cid="'+class_id+'"  ' +
        //         '>رزرو جلسه </span>'+
        //         '</div>'+
        //         '</div>'+
        //
        //         '</div>';
        //     var e= '<div class="buto">'+
        //         '<span>'+ftime+'</span>'+
        //         '</div>';
        //
        //     if(ad.hasClass('open')){
        //         parent.append(d);
        //         $(this).append(e).addClass('act');
        //     }else if(bd.hasClass('open')){
        //         parent.append(d);
        //         bd.append(e).addClass('act');
        //
        //     }
        //
        //
        //
        //     $('body').on('click','#student_reserve',function (e) {
        //         // $('body').LoadingOverlay("show"  )
        //         // if (el.hasClass("red")){
        //         //     el.removeClass('red')
        //         // }else{
        //         //     el.addClass('red')
        //         // }
        //         // if (a.hasClass("red")){
        //         //     a.removeClass('red')
        //         // }else{
        //         //     a.addClass('red')
        //         // }
        //
        //
        //         var element=$(this)
        //         var id= $(this).data('id')
        //         var class_id= $(this).data('cid')
        //         var user_id= $('#res_student').data('user')
        //         var count_id= $('#res_student').data('count')
        //         var date= $(this).data('date')
        //         var time= $(this).data('time')
        //         $('#date_e').text(date)
        //         $('#time_e').text(time)
        //         // $([document.documentElement, document.body]).animate({
        //         //     scrollTop: $("#nextstep").offset().top-300
        //         // }, 1000);
        //         document.querySelector('#nextstep2').scrollIntoView({ behavior: 'smooth' })
        //
        //         // $("#nextstep").get(0).scrollIntoView()
        //         $('#nextstep').show(400)
        //
        //
        //
        //         $('#time_meet').val(class_id)
        //         $('body').on('click','#s_reserve',function (e) {
        //             $('body').LoadingOverlay("show"  )
        //             window.location.href='/student/reserve/'+user_id+'/'+count_id+'/'+class_id
        //         })
        //         $('body').on('click','#s_change',function (e) {
        //             $('#a_meet').val(class_id)
        //             $('#form_ch').submit()
        //             $('body').LoadingOverlay("show"  )
        //         })
        //     })
        //
        // })


        // if($( "#teacher-clander .cond ul" ).length){
        //
        //
        //
        //     if($( "#teacher-clander .cond ul" ).length){
        //         $( document ).drag("start",function( ev, dd ){
        //             return $('<div class="selectiong" />')
        //                 .css('opacity', .65 )
        //                 .appendTo( document.body );
        //         })
        //             .drag(function( ev, dd ){
        //                 $( dd.proxy ).css({
        //                     top: Math.min( ev.pageY, dd.startY ),
        //                     left: Math.min( ev.pageX, dd.startX ),
        //                     height: Math.abs( ev.pageY - dd.startY ),
        //                     width: Math.abs( ev.pageX - dd.startX )
        //                 });
        //             })
        //             .drag("end",function( ev, dd ){
        //                 $( dd.proxy ).remove();
        //             });
        //         $('.hour')
        //             .drop("start",function(){
        //                 $( this ).addClass("reservedd");
        //             })
        //             .drop(function( ev, dd ){
        //                 if ( $( this ).hasClass('cancel')){
        //                     $( this ).addClass("certain");
        //                     $( this ).removeClass("cancel");
        //                     $( this ).find('.op').prop('checked', true)
        //                     $( this ).find('.can').prop('checked', false)
        //                     console.log('drag_has_cancel')
        //                 }else if ( $( this ).hasClass('certain')){
        //                     $( this ).removeClass("certain");
        //                     $( this ).addClass("cancel");
        //                     console.log('drag_has_certain')
        //                     $( this ).find('.op').prop('checked', false)
        //                     $( this ).find('.can').prop('checked', true)
        //
        //                 }else if($( this ).hasClass('reserved')) {
        //                 }else {
        //                     $( this ).toggleClass("open");
        //                     if ($(this).find('.op').is(':checked')){
        //                         console.log('checked')
        //                         $( this ).find('.can').prop('checked', true)
        //                         $( this ).find('.op').prop('checked', false)
        //                     }else {
        //                         $( this ).find('.op').prop('checked', true)
        //                         $( this ).find('.can').prop('checked', false)
        //                         console.log('unchedke')
        //                     }
        //                     console.log('drag_has_open')
        //                 }
        //             })
        //             .drop("end",function(){
        //                 $( this ).removeClass("reservedd");
        //             });
        //         $.drop({ multi: true });
        //
        //         $('body').on('click', '#teacher-clander .cond ul li .hour', function () {
        //             if($(this).hasClass('certain')){
        //                 $(this).removeClass('certain');
        //                 $(this).addClass('cancel');
        //                 $( this ).find('.op').prop('checked', false)
        //                 $( this ).find('.can').prop('checked', true)
        //             }else  if($(this).hasClass('cancel')){
        //                 $(this).removeClass('cancel');
        //                 $(this).addClass('certain');
        //                 $( this ).find('.op').prop('checked', true)
        //                 $( this ).find('.can').prop('checked', false)
        //             }
        //             else if($(this).hasClass('open')){
        //                 console.log('a')
        //                 $(this).removeClass('open');
        //                 $( this ).find('.can').prop('checked', true)
        //                 $( this ).find('.op').prop('checked', false)
        //             }else{
        //                 $(this).addClass('open');
        //                 $( this ).find('.op').prop('checked', true)
        //                 $( this ).find('.can').prop('checked', false)
        //                 console.log('b')
        //
        //             }
        //         })
        //
        //
        //     }
        //
        //     $('#teacher-clander .cond ul').lightSlider({
        //         item:7,
        //         rtl:true,
        //         loop:false,
        //         enableTouch:false,
        //         enableDrag:false,
        //         pager:false,
        //         slideMove:7,
        //         easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        //         speed:600,
        //         responsive : [
        //             {
        //                 breakpoint:1000,
        //                 settings: {
        //                     item:5,
        //                     slideMove:5,
        //                     slideMargin:6,
        //                 }
        //             },
        //             {
        //                 breakpoint:600,
        //                 settings: {
        //                     item:3,
        //                     slideMove:3,
        //                     slideMargin:6,
        //                 }
        //             }
        //         ]
        //     });
        //
        // }
        if($( "#teacher-clander .cond ul" ).length) {
            $('#teacher-clander .cond ul').lightSlider({
                item: 7,
                rtl: true,
                loop: false,
                enableTouch: false,
                enableDrag: false,
                pager: false,
                slideMove: 7,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                speed: 600,
                responsive: [
                    {
                        breakpoint: 1000,
                        settings: {
                            item: 5,
                            slideMove: 5,
                            slideMargin: 6,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            item: 3,
                            slideMove: 3,
                            slideMargin: 6,
                        }
                    }
                ]
            });
        }
        $('.lang-listc .lang-list li').click(function(){
            var a= $(this).find('.top').text();
            var b= $(this).find('.id').text();
            $('.lang-listc input').val(a);
            $('.lang-listc .lang-list').fadeOut();
            $('.lang_id').val(b)

        })

        $('body').on('click','#start_reserve',function (e) {
            var id= $(this).data('id')
            var class_id= $(this).data('cid')
            $('#time_meet').val(class_id)
            var date= $(this).data('date')
            var time= $(this).data('time')
            $('.s_time').text(date +' '+ time)
            $('#'+'level1_'+id).show(400)

        })






        $('.about-more > div').click(function(){
            $(this).parent().remove();
            var a= $('.about-text > div').height()+100;
            var a= $('.about-text').addClass('active').css('max-height',a);
        })







        $('#teacher-scadule .today span.prev').click(function(){
            $('.lSAction>a.lSPrev').click();
        })
        $('#teacher-scadule .today span.next').click(function(){
            $('.lSAction>a.lSNext').click();
        })




        $('.input-container input').focus(function() {

            $(this).parent().addClass('active');
        })


        $('.input-container input').blur(function() {
            if($(this).val()){

            }else{
                $(this).parent().removeClass('active');
            }
        })



        $('.text-container textarea').focus(function() {

            $(this).parent().addClass('active');
        })


        $('.text-container textarea').blur(function() {
            if($(this).val()){

            }else{
                $(this).parent().removeClass('active');
            }
        })






        $('.payment-method .discount-form .top').click(function(){
            $(this).siblings('.bot').slideToggle(300);
        })



        $('#mmenud').click(function(e){
            e.stopPropagation()
            $('#dashside').toggleClass('active');
        })

        $('body').click(function(){
            $('#dashside').removeClass('active');
        })
        $('#dashside').click(function(e){
            e.stopPropagation()
        })



        if($(".countdown").length){
            $(".countdown").each(function(){
                var a = $(this).data('time');
                $(this).countdowntimer({
                    dateAndTime : a,
                    size : "lg",
                    displayFormat: 'DHMS',
                    labelsFormat: true
                });
            })

        }



        $('.single-cupclass div.left .buttons .options .top').click(function(){
            $(this).siblings('.drop').fadeToggle();
            $(this).parents('.single-cupclass').siblings().find('.drop').fadeOut();
            // $('.single-cupclass div.left .buttons .options .drop').slideToggle();
        })

        $('body').click(function(){
            $('.single-cupclass div.left .buttons .options .drop').fadeOut();
        })
        $('.single-cupclass div.left .buttons .options').click(function(e){
            e.stopPropagation()
        })






        if($("input.spinner").length){

            $("input.spinner").inputSpinner()
        }



        // Start Faq
        $('.faq .question').click(function(){
            if($(this).parent().hasClass('active')){
                $(this).parent().removeClass('active');
                $(this).siblings().slideUp();
            }else{
                $(this).parent().addClass('active');
                $(this).siblings().slideDown();

                $(this).parent().siblings().removeClass('active').children('.answer').slideUp();
            }
        })




        if($( "#mytextarea" ).length){

            tinymce.init({
                selector: '#mytextarea',
                theme : "silver",
                language : "fa_IR",
                branding: false,
                plugins: "paste",
                paste_as_text: true
            });

        }



        // $('#article-from .add-tag .form .addt').click(function(){
        //     var a= $(this).siblings().val();
        //     var c= $(this).parent().siblings('.result');
        //     var b= '<span><i><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 16C6.41775 16 4.87103 15.5308 3.55544 14.6518C2.23985 13.7727 1.21447 12.5233 0.608967 11.0615C0.00346633 9.59966 -0.15496 7.99113 0.153721 6.43928C0.462403 4.88743 1.22433 3.46197 2.34315 2.34315C3.46197 1.22433 4.88743 0.462403 6.43928 0.153721C7.99113 -0.15496 9.59966 0.00346622 11.0615 0.608967C12.5233 1.21447 13.7727 2.23985 14.6518 3.55544C15.5308 4.87103 16 6.41775 16 8C16.0001 9.05061 15.7933 10.091 15.3913 11.0616C14.9893 12.0323 14.4 12.9142 13.6571 13.6571C12.9142 14.4 12.0323 14.9893 11.0616 15.3913C10.091 15.7933 9.05061 16.0001 8 16ZM8 6.86928L5.73763 4.60598L4.60506 5.73855L6.86835 8.00093L4.60506 10.2633L5.7367 11.3949L7.99908 9.13165L10.2615 11.3949L11.3931 10.2633L9.1298 8.00093L11.3931 5.73855L10.2624 4.60598L8 6.86928Z" fill="currentColor"/></svg></i>'+a+'</span>';
        //     if (a){
        //         c.append(b);
        //     }
        // })

        if($("#teacher-sidebar").length){
            $('#teacher-content, #teacher-sidebar').theiaStickySidebar({
                // Settings
                // additionalMarginBottom: 200
            });
        }

        $('body').on('click', '#article-from .add-tag div.result span i', function() {
            $(this).parent().remove();
        })


        $('.expert-form .expert-section .form .addt').click(function(){
            var a= $(this).siblings().val();
            var c= $(this).parent().siblings('.result');
            var b= '<span><i><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 16C6.41775 16 4.87103 15.5308 3.55544 14.6518C2.23985 13.7727 1.21447 12.5233 0.608967 11.0615C0.00346633 9.59966 -0.15496 7.99113 0.153721 6.43928C0.462403 4.88743 1.22433 3.46197 2.34315 2.34315C3.46197 1.22433 4.88743 0.462403 6.43928 0.153721C7.99113 -0.15496 9.59966 0.00346622 11.0615 0.608967C12.5233 1.21447 13.7727 2.23985 14.6518 3.55544C15.5308 4.87103 16 6.41775 16 8C16.0001 9.05061 15.7933 10.091 15.3913 11.0616C14.9893 12.0323 14.4 12.9142 13.6571 13.6571C12.9142 14.4 12.0323 14.9893 11.0616 15.3913C10.091 15.7933 9.05061 16.0001 8 16ZM8 6.86928L5.73763 4.60598L4.60506 5.73855L6.86835 8.00093L4.60506 10.2633L5.7367 11.3949L7.99908 9.13165L10.2615 11.3949L11.3931 10.2633L9.1298 8.00093L11.3931 5.73855L10.2624 4.60598L8 6.86928Z" fill="currentColor"/></svg></i>'+a+'</span>';
            if (a){
                c.append(b);
            }
        })

        $('body').on('click', '.remove_tag', function() {
            console.log(133333)
            $(this).remove();
        })



        $('.user-menu .drops .top').click(function(){
            $('#header-dashboard .user-menu ul li .drops .drop').fadeOut();

            $(this).siblings('.drop').fadeToggle();
        })

        $('.user-menu .drops').click(function(e){
            e.stopPropagation();
        })


        $('body').click(function(){
            $('#header-dashboard .user-menu ul li .drops .drop').fadeOut();
        })


        $('#header #header-choose-lang div.top').click(function(){
            $(this).siblings('.drop').fadeToggle();
        })

        $('#header #header-choose-lang').click(function(e){
            e.stopPropagation();
        })


        $('body').click(function(){
            $('#header #header-choose-lang .drop').fadeOut();
        })

        $('#side-choose-lang div.top').click(function(){
            $(this).siblings('.drop').fadeToggle();
        })

        $('#side-choose-lang').click(function(e){
            e.stopPropagation();
        })


        $('body').click(function(){
            $('#side-choose-lang .drop').fadeOut();
        })



        $('#filters .applied-filters .show-filter .cancel').click(function(e){
            e.stopPropagation();
            $('#filters .filters').toggleClass('active');
        })

        $('#filters .filters').click(function(e){
            e.stopPropagation();
        })

        $('body').click(function(){
            $('#filters .filters').removeClass('active');
        })





    })
})(jQuery);
