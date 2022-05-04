import { EnrollAnimator } from "./EnrollAnimator.js";
import { EnrollProcessor } from "./EnrollProcessor.js";

(function SetUp() {
    let enrollAnimator = new EnrollAnimator();

    let buttons = document.getElementsByClassName( "course-button" );
    for ( let button of buttons )
    {
        button.addEventListener( "click", () => enrollAnimator.SwitchVisibility() );
    }

    let enrollProcessor = new EnrollProcessor();
})()