function telephoneCheck(str) {
    var regex = /^(1\s?)?(\(\d{3}\)|\d{3})[\s\-]?\d{3}[\s\-]?\d{4}$/ ;
    //^(1\s?)?: Phía đầu phải là "1 ","1",""(Ko có gì)
    //\( \d{3} \): (3 số bất kỳ)
    //|: Hoặc là
    //\d{3}: 3 số bất kỳ(Ko có ngoặc)
    //[\s\-]?: Hoặc là khoảng trắng, hoặc là dấu '-', hoặc là ko có gì
    //\d{3}: 3 số bất kỳ
    //[\s\-]?: Hoặc là khoảng trắng, hoặc là dấu '-', hoặc là ko có gì
    //\d{4}: 4 số bất kỳ
    //$: Phía cuối ko được xuống dòng
    return regex.test(str);
}
