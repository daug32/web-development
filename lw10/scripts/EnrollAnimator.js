export class EnrollAnimator {
    constructor() {
        this.isShown = false;
        this.enroll = document.getElementById("enroll");

        this.enroll.addEventListener( "click", () => this.isShown ? this.Hide() : 0 );
    }

    Show() {
        this.isShown = true;
        this.enroll.classList.remove( "hide" );
    }

    Hide() {
        this.isShown = false;
        this.enroll.classList.add("hide");
    }
}