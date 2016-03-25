/*
 Interactive house

 */

// Mouseenter Event Listeners
var theads = document.querySelectorAll('.house-card thead');

for (var i = 0; i < theads.length; i++) {

    theads[i].addEventListener('mouseenter', function (e) {

        var targetText = this.innerHTML;

        for (var j = 0; j < theads.length; j++) {

            var thisText = theads[j].innerHTML;

            if (targetText != thisText) {

                // Make the other headings invisible
                theads[j].style.display = "none";
            } else {
                // Hightlight the target heading
                theads[j].classList.add("green");
            }
        }

        // Make the target body visible
        var body           = this.nextElementSibling;
        body.style.display = 'block';

        // Make the house element visible
        var svgName       = this.querySelector('th').getAttribute('data-svg');
        var svg           = document.getElementById(svgName);
        svg.style.display = "block";
    });
}


// Mouseleave Event Listeners
var tables = document.querySelectorAll('.house-card table');

for (var i = 0; i < tables.length; i++) {

    tables[i].addEventListener('mouseleave', function (e) {

        // Make all the bodies invisible
        var body           = this.lastElementChild;
        body.style.display = 'none';

        // Make the house element invisible
        var svgName       = this.querySelector('th').getAttribute('data-svg');
        var svg           = document.getElementById(svgName);
        svg.style.display = "none";


        for (var j = 0; j < tables.length; j++) {

            // Make all the headings visible
            tables[j].firstElementChild.style.display = "block";
            tables[j].firstElementChild.classList.remove("green");
        }
    });


}
