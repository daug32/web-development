class EnrollAnimator 
{
    constructor() 
    {
        this.isShown = false;
        
        this.aenrollBackground = document.getElementById( "enroll" );
        this.enroll = document.getElementsByClassName( "enroll__container" )[0];
        this.Hide();

        // hide on click at the exit button
        this.enroll.children[0].addEventListener( "click", () => this.Hide() );
        
        // hide enroll form if we click at the empty space
        this.enrollBackground.addEventListener( "click", () => this.Hide() );
        this.enroll.addEventListener( "click", ( event ) => event.stopPropagation() );

        // hide enroll if ESC is pressed
        document.addEventListener( "keyup", ( event ) => 
        {
            if ( !this.isShown ) return;
            if ( event.code != "Escape" ) return;
            this.Hide();
        });
    }

    Show() 
    {
        this.isShown = true;
        this.enroll.classList.remove( "hide" );
        this.enroll.classList.remove( "shrink" );
        this.enrollBackground.classList.remove( "hide" );
    }

    Hide() 
    {
        this.isShown = false;
        this.enroll.classList.add( "hide" );
        this.enroll.classList.add( "shrink" );
        this.enrollBackground.classList.add( "hide" );
    }

    SwitchVisibility()
    {
        if ( this.isShown ) 
        {
            this.Hide();
        }
        else 
        {
            this.Show();
        }
    }
}

(function SetUp() {
    let enrollAnimator = new EnrollAnimator();

    let buttons = document.getElementsByClassName( "course-button" );
    for ( let button of buttons )
    {
        button.addEventListener( "click", () => enrollAnimator.SwitchVisibility() );
    }

})()