function IsPrime(array) 
{
    // can be processed if a number
    if ( !isNaN(array) ) array = [array];

    // garantee that array exists and at least is an Array
    if(!Array.isArray(array)) 
    {
        console.log( "Invalid input" );
        return;
    }

    // garantee that array is Array<Number>
    array = array.filter( el => !isNaN(el) && el >= 2 );
    
    let findMaxNum = (el, result) => 
    {
        let value = Math.abs(el);
        if (value < result) return result;
        return el;
    };
    let maximalNum = array.reduce(findMaxNum, 0);
    let middleNum = Math.floor(Math.sqrt(maximalNum));

    for (let i = 2; i <= middleNum; i++) 
        for (let j = 2; j <= maximalNum / i; j++)
        {
            let pos = array.findIndex( el => el == i * j);
            if (pos < 0) continue;
            console.log( "Not a prime: " + array.splice(pos, 1) );
        }

    array.forEach( el => console.log( "Prime: " + el ));
}

(function IsPrimeTest() 
{
    let array = new Array(100);
    for(let i = 0; i < array.length; i++) 
    {
        array[i] = Math.floor( (Math.random() - 0.5) * 1000 );
    }

    IsPrime([]);
    IsPrime(null);
    IsPrime("Not a number");

    IsPrime([... array]);

    array[23] = "Something";
    array[40] = "Something";
    IsPrime([... array]);

    function PrinTest(result, expected = null)
    {
        if (expected != null) 
            console.log(`Expected: ${expected}`);
        console.log(`Result: ${result}`);
    }
})();