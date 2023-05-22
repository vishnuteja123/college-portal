function validate() {
    var college_id = document.getElementById("college_id");
    var first_password = document.getElementById("first_password");
    var second_password = document.getElementById("second_password");
    
    var temp = college_id.value;
    var n = temp.length;

    //Validating the length of the college ID and password
    if(n != 10 || !(first_password.value === second_password.value)) {
        if(n != 10) {
            alert("Enter valid college ID!");
            return false;
        }
        alert("Re-Entered Password must match first entered password!");
        return false;
    }
    
    var compare1 = "VE1A0", compare2 = "VE5A0";//regex
    var sliced = temp.slice(2, 7);//Slicing the part of the entered college id

    //Validating the college ID regex
    if(compare1 != sliced && compare2 != sliced) {
        alert("Enter valid collereteyge ID!");
        return false;
    }

    n = first_password.value.length;
    if(n < 8) {
        alert("password must be atleast 8 characters");
        return false;
    }
    var cap = false, small = false, special_char = false, num = false;
    for(var i = 0; i < n; ++i) {
        var ch = first_password.value.charAt(i);
        if(ch >= 'A' && ch <= 'Z') cap = true;
        if(ch >= 'a' && ch <= 'z') small = true;
        if(ch === '_' || ch === '@' || ch === '$' || ch === '^' || ch === '.' ) special_char = true;
        if(ch >= '0' && ch <= '9') num = true;
    }
    if(cap === false || small === false || special_char === false || num === false) {
            alert(cap + " " + small + " " + special_char + " " + num);
            alert("enter valid password");
            return false;
    }

    return true;
}