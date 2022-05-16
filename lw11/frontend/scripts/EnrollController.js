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
        // let requestSettings = {
        //     body: ""
        // };
        
        // let email = this.getForm.email;
        // if ( email != null && email.length > 0 )
        // {
        //     requestSettings.body = JSON.stringify( email );
        // }

        // fetch( this.url + "get", requestSettings )
        //     .then( response => response.json() )
        //     .then( data => 
        //         {
        //             if ( data.status != 200 ) return;
        //             let users = JSON.parse( data.message );
        //             this.OnDataRecieve( users );
        //         }); 

        fetch( this.url + "get" )
            .then( response => response.json() )
            .then( data => 
                {
                    if ( data.status != 200 ) return;
                    let users = JSON.parse( data.message );
                    this.OnDataRecieve( users );
                }); 
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

        let request = new XMLHttpRequest();

        request.open( "POST", this.url + "enroll", false );
        request.send( JSON.stringify( dto ) );
        
        if ( request.status > 299 ) 
        {
            let response = JSON.parse( request.response );
            this.ShowError( response.message );
            return;
        }

        this.OnSuccessResponse();
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