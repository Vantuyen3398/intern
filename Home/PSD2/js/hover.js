// hover
        var mouse = document.getElementsByClassName("recent-courses__container");
        var hinh = document.querySelectorAll(".recent-courses__img img");

        function eventHover(ele, n) {
            if (window.screen.width >= 992) {
                var index = n + 3;
                for (var i = 0; i < hinh.length; i++) {
                    if (n == i) {
                        hinh[n].style.height = hinh[n].clientHeight - 50 + "px";
                        hinh[n].style.width = "100%";
                    }
                    if (index == i) {
                        if (hinh[index].clientHeight == 0) {
                            hinh[index].style.height = hinh[n].clientHeight;
                        }
                        else {
                            hinh[index].style.height = hinh[index].clientHeight + 50 + "px";
                            hinh[index].style.objectFit = "cover";
                        }

                        mouse[index].style.transform = "translate(0, -50px)";
                    }
                }
            }
            else {
                hinh[n].style.height = hinh[n].clientHeight - 50 + "px";
                hinh[n].style.width = "100%";
            }

        }
        function eventOut(els, n) {
            if (window.screen.width >= 992) {
                var index = n + 3;
                for (var i = 0; i < hinh.length; i++) {
                    if (n == i) {
                        hinh[n].style.height = hinh[n].clientHeight + 50 + "px";
                        hinh[n].style.width = "100%"
                    }
                    if (index == i) {
                        hinh[index].style.height = hinh[index].clientHeight - 50 + "px";
                        mouse[index].style.transform = "translate(0, 0)";
                    }
                }
            }
            else {
                hinh[n].style.height = hinh[n].clientHeight + 50 + "px";
                hinh[n].style.width = "100%"
            }

        }

        // hover end

        function openNav() {
            var x = document.querySelector(".top-bar .row:last-of-type .col:not(:first-of-type)");
            if (x.className === "col") {
                var cot = document.querySelectorAll(".top-bar .row:last-of-type .col:not(:first-of-type)");
                for (let i = 0; i < cot.length; i++) {
                    cot[i].className += " responsive";
                }
            } else {
                var cot = document.querySelectorAll(".top-bar .row:last-of-type .col:not(:first-of-type)");
                for (let i = 0; i < cot.length; i++) {
                    console.log(cot[i].className);
                    cot[i].className = cot[i].className.replace(" responsive", "");
                }
            }
        }