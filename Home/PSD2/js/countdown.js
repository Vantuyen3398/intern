// Set the date we're counting down to
        var countDownDate = new Date("Jun 23, 2021 00:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            if (seconds < 10) {
                document.getElementById("sec").innerHTML = "0" + seconds;
            }
            else {
                document.getElementById("sec").innerHTML = seconds;
            }
            if (hours < 10) {
                document.getElementById("hour").innerHTML = "0" + hours;
            }
            else {
                document.getElementById("hour").innerHTML = hours;
            }
            if (days < 10) {
                document.getElementById("day").innerHTML = "0" + days;
            }
            else {
                document.getElementById("day").innerHTML = days;
            }
            if (minutes < 10) {
                document.getElementById("min").innerHTML = "0" + minutes;
            }
            else {
                document.getElementById("min").innerHTML = minutes;
            }
            if (distance < 0) {
                document.getElementById("day").innerHTML = "00";
                document.getElementById("hour").innerHTML = "00";
                document.getElementById("min").innerHTML = "00";
                document.getElementById("sec").innerHTML = "00";
            }
        }, 1000);