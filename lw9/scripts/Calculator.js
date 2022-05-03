

function CalculatePolishNotaion(expression) {
    let result = 0;
    let error = "";
    let position = 0;

    ValidateInput();
    if (error.length > 0) return error;

    let operation = GetOperation();
    let a = GetOperand();
    if (IsExpression(a)) a = CalculatePolishNotaion(a);

    let b = GetOperand();
    if (IsExpression(b)) b = CalculatePolishNotaion(b); 
    result += ExecuteOperation(operation, a, b);

    if (error.length > 0) return error;

    return result;

    function ValidateInput() 
    {
        if (expression == null) return error += "Expression is null. ";
        if (expression.length < 1) return error += "Expression is empty. ";
    }

    function GetOperation() 
    {
        return expression[position];
    }

    function GetOperand() 
    {

    }

    function IsExpression() 
    {

    }

    function ExecuteOperation(operation, a, b) 
    {
        switch(operation) 
        {
            case "+": 
                return a + b;
            case "-":
                return a - b;
            case "/":
                return a / b;
            case "*":
                return a * b;
            default: 
                error += "Invalid operation. ";
        }
    }
}

function CalculatePolishNotationTest() {
    console.log( CalculatePolishNotaion(null) );
    console.log( CalculatePolishNotaion("") );
    console.log( CalculatePolishNotaion("Qwerty Uiop") );

    console.log( `
        Expression: 4 + 3;
        Result: ${CalculatePolishNotaion("+ 4 3")}; 
        Expected: 7;` );
        
    console.log( `
        Expression: 4 * 2 + 3 * 2;
        Result: ${CalculatePolishNotaion("+ * 4 2 * 3 2")}; 
        Expected: 14;` );
        
    console.log( `
        Expression: 8 * (4 + 3);
        Result: ${CalculatePolishNotaion("* 8 (+ 4 3)")}; 
        Expected: 56;` );
        
    console.log( `
        Expression: 4 + -2;
        Result: ${CalculatePolishNotaion("+ 4 -2")}; 
        Expected: 2;` );
        
    console.log( `
        Expression: 4 + 2.5;
        Result: ${CalculatePolishNotaion("+ 4 2.5")}; 
        Expected: 6.5;` );
        
};