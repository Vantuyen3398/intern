var slideIndex = 0;
        showSlides(slideIndex);
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {

            var i;

            var slides = document.getElementsByClassName("mySlides"); 

            var img = document.getElementsByClassName("show");

            var name = document.getElementsByClassName("user_info");

            var listText = document.getElementsByClassName("texts")
            if (n >= slides.length) { slideIndex = 0 }
            if (n < 0) { slideIndex = slides.length - 1 }
            for (i = 0; i < slides.length; i++) {

                slides[i].style.filter = "opacity(20%)";
                slides[i].style.display = "inline-block";
                img[i].style.display = "none";
                name[i].style.display = "none";
                listText[i].style.display = "none";
            }
            slides[slideIndex].style.display = "none";
            img[slideIndex].style.display = "inline-block";
            name[slideIndex].style.display = "block";
            listText[slideIndex].style.display = "block";
        }