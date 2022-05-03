import { EnrollAnimator } from "./EnrollAnimator.js";  

const enrollAnimator = new EnrollAnimator();

(function SetUp() {
    enrollAnimator.Hide();

    let buttons = document.getElementsByClassName( "course-button" );
    for ( let button of buttons )
    {
        let switchEnrollVisibility = () => enrollAnimator.isShown ? enrollAnimator.Hide() : enrollAnimator.Show(); 
        button.addEventListener( "click", switchEnrollVisibility );
    }
})();
