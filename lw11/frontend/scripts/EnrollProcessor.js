export class EnrollProcessor 
{
    constructor()
    {
        this.url = "localhost:8080/";
        this.form = document.forms.enroll;
        this.form.addEventListener( "submit", ( event ) => this.SaveData( event ) );
    }

    ValidateData( event )
    {
        let isValid = true;
        isValid &= TestField( this.form.name, "^[a-zA-Z]+$" );
        isValid &= TestField( this.form.email, "^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$" );
        if( !isValid ) 
        {
            return false;
        }

        return true;

        function TestField( field, regex )
        {
            let fieldRegex = new RegExp( regex );

            if ( field.value == null || !fieldRegex.test( field.value ) )
            {
                field.classList.add( "enroll__invalid-property" );
                return false;
            }

            field.classList.remove( "enroll__invalid-property" );
            return true;
        }
    }

    SaveData( event )
    {
        event.preventDefault();

        if ( !this.ValidateData( event ) ) 
        {
            event.preventDefault();
            return;
        }

        let data = [this.form.email, this.form.name, this.form.profession];

        let request = new XMLHttpRequest();
        request.open( "POST", this.url + "enroll" );
        request.send( data );
    }
}