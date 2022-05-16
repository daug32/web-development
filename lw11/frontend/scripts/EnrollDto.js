export class EnrollDto
{
    constructor( email = "", name = "", profession = "", isSubscribed = false )
    {
        this.email = email;
        this.name = name;
        this.profession = profession;
        this.isSubscribed = isSubscribed;
    }
}