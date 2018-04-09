$ = jQuery.noConflict();

$(function(){

     //############################## MENU MOBILE ###############################//
    $('.mobile-menu').click(function(){
        $('.main-navigation').toggle();
    })

     //############################## TAILLE ECRAN ###############################//

       function checkWindowRatio(){ // Définit le ratio de l'écran
         var windowHeight = $(window).height();
         var windowWidth = $(window).width();

         if(windowWidth > windowHeight){
           return 'landscape';
         }
         else{
           return 'portrait';
         }
       }

       var ratio = checkWindowRatio();


    //----------HAUTEUR
    function screenHeight(element){ // Donne la taille de la fenêtre à l'élément
        $(element).height($(window).height());
    }
    screenHeight('.home-title-container');
    screenHeight('.not-found.container');

    function resizeBody(){// Donne une taille minimale à la page
      if($('body').height() < ($(window).height()) - 40){
        $('body').height($(window).height() - 40);
      }
    }
    resizeBody();



    $(window).on('resize', function(){ // Actions lorsque la fenêtre change de taille
        var newRatio = checkWindowRatio();
        if(newRatio != ratio){ // Si le ratio change, la page est rechargée
          window.location.href = window.location.href;
        }
        // On réinitialise la taille des éléments en fonction de la nouvelle taille de fenêtre
        screenHeight('.home-title-container');
        screenHeight('.not-found.container');
        resizeBody();
    });




    //####################### DESCRIPTION PAGES ACCUEIL ##########################//
    $('.pages-list-ele').on('click mouseenter', function(){ // Affichage de la description des pages au hover ou click sur leur image
        var descriptionElement = '#' + $(this).attr('id') + '-description';
        $('.pages-list-ele-description').not(descriptionElement).hide();
        $(descriptionElement).fadeIn(500);
    })



    //#################### FORMULAIRE INSCRIPTION ACTIVITE #######################//
    $('.s-inscrire').on('click', function(){ // Afficher le formulaire au click sur le bouton "s'inscrire"
        $('.formulaire-id-activite').val($(this).attr('event-id'));
        $('.formulaire-nom-activite').text($(this).attr('event-name'));
            $('.inscription-activites').css('background-color', 'rgba(0,0,0,0.5)').css('display', 'flex');
    })

    $('.inscription-activites input[type="submit"], .annuler-inscription-evenement').on('click', function(){ // Le formulaire disparaît à la soumission et à l'annulation
        $('.inscription-activites').hide();
    })


    //############################## SCROLL EVENTS ###############################//
    if($(window).width() > 768 && $('body').hasClass('home')){
        $(window).scroll(function (){

            windowYOffset = $(window).scrollTop();

            //############################ ECRAN D'ACCUEIL #################################//
            if($(window).scrollTop() < $('.home-content').offset().top && $(window).scrollTop() > 10){ // Effets écran d'accueil
                 blur = 'blur(' + (0.07 * windowYOffset  - 1) + 'px)';
                 overlayOpacity = windowYOffset / $('.home-title-container').height();
                 $('.home-title-container h1').css('filter', blur );
                 $('.home-title-container-overlay').css('opacity', overlayOpacity  );

            }else{
               $('.home-title-container h1').css('filter', 'none' );
               $('.home-title-container-overlay').css('opacity', 0 );
             }


            //############################ PRE-FOOTER #################################//
            //--------BACKGROUND
            if($(window).scrollTop() >= $('.pre-footer').offset().top - $(window).height()){ // Paralax du pre-footer qui démarre lorsqu'il est visible
                var start = $('.pre-footer').offset().top - $(window).height();
                var speed = 0.32;
                windowYOffset = $(window).scrollTop();
                backgroundPos =  '-' + ((windowYOffset - start)  * speed) + "px";
                $('.pre-footer').css('background-position', backgroundPos);
            }

            //--------TEXT
            if($(window).scrollTop() >= $('.pre-footer').offset().top - 0.8 * $(window).height()){ // Animation du texte du pre-footer lorsqu'il est visible
              $('.pre-footer .hero-text').css('letter-spacing', '3rem').css('opacity', '0.6');
             }
             else{
                $('.pre-footer .hero-text').css('letter-spacing', '0.5rem').css('opacity', '0');
             }
        });//$(window).scroll(function()

    }//if($(window).width() > 785 && $('body').hasClass('home'))

})//$(function(){
