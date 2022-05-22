import { EnrollDto } from "/scripts/EnrollDto.js";

export class EnrollController 
{
    constructor()
    {
        this.url = "http://localhost:80/";
        this.OnSuccessResponse = () => {};
        this.OnDataRecieve = ( data ) => {};

        this.form = document.forms.enroll;
        if ( this.form != null ) // меняем дефолтный submit для формы регистрации 
            this.form.addEventListener( "submit", event => 
            {
                event.preventDefault();
                this.SendData();
            } );

        this.getForm = document.forms.namedItem( "enroll-get" );
        if ( this.getForm != null )  // меняем дефолтный submit для формы получния данных 
            this.getForm.addEventListener( "submit", event => 
            {
                event.preventDefault();
                this.GetData();
            } );
    }

    GetData()
    {
        let url = this.url + `get`;
        if ( this.getForm.email.value != null ) 
        {
            url += `/?email=${this.getForm.email.value}`;
        }
        
        fetch( url )
            .then( response => response.json() )
            .then( data => 
                {
                    let status = data.status;
                    let users = JSON.parse( data.message );
                    this.OnDataRecieve( status, users );
                } )
            .catch( err => this.OnDataRecieve( 400, [] ) );
    }

    SendData()
    {
        if ( !this.ValidateData() ) return;

        let dto = new EnrollDto( 
            this.form.email.value,
            this.form.name.value,
            this.form.profession.value,
            this.form.subscribe.checked 
        );

        let url = this.url + "enroll";
        let settings = 
        { 
            body: JSON.stringify( dto ),
            method: "post"
        };

        fetch( url, settings )
            .then( response => response.json() ) 
            .then( data => 
            {
                if ( data.status < 200 || data.status > 299 )
                {
                    this.ShowError( data.message );
                    return;
                }

                this.OnSuccessResponse();
            } );
    }

    ValidateData()
    {
        let nameRegex = "^[a-zA-Z]+$";
        if ( !TestField( this.form.name, nameRegex ) )
        {
            return false;
        }

        let emailRegex = "^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$";
        if ( !TestField( this.form.email, emailRegex ) )
        {
            return false;
        }

        return true;

        function TestField( field, regexStr )
        {
            let value = field.value;
            if ( value == null ) 
            {
                return false;
            }

            let regex = new RegExp( regexStr );
            let isValid = regex.test( value );

            if ( isValid )
                field.classList.remove( "enroll__invalid-property" );
            else 
                field.classList.add( "enroll__invalid-property" );

            return isValid;
        }
    }

    ShowError( message )
    {
        let anchor = document.getElementsByClassName( "enroll__container" )[0];
        anchor.innerHTML = `
            <img src="/images/Exit.svg" alt="" class="enroll__exit">
            <p class="enroll__error text">${message}</p>`;
    }
}