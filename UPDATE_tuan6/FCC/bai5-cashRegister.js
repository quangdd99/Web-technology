function checkCashRegister(price, cash, cid){
    let change = cash - price;
    let answer = {
        status: "",
        change: []
    };
    var category = [
        { name: "PENNY", val: 0.01 },      
        { name: "NICKEL", val: 0.05 },
        { name: "DIME", val: 0.1 },
        { name: "QUARTER", val: 0.25 },
        { name: "ONE", val: 1.0 },
        { name: "FIVE", val: 5.0 },
        { name: "TEN", val: 10.0 },
        { name: "TWENTY", val: 20.0 },
        { name: "ONE HUNDRED", val: 100.0 }
    ];
    let toltalCid = 0;
    cid.forEach(e => {
        toltalCid += e[1];
    });
    // toltalCid = Math.round(toltalCid*100)/100;

    if(toltalCid === change) {
        answer = {
            status: "CLOSED",
            change: cid
        }
        return answer;
    }
    else if(toltalCid < change) {
        answer = {
            status : "INSUFFICIENT_FUNDS",
            change: []
        }
        return answer;
    }
    else {
        for( let i = cid.length - 1; i>=0; i--){
            if(change >= category[i].val && change >= cid[i][1] ){
                answer.change.push(cid[i]);
                change -= cid[i][1];
                change = Math.round(change * 100) / 100;
            }
            else if(change >= category[i].val && change <= cid[i][1] ){
                let fund = Math.floor(change / category[i].val) * category[i].val;
                answer.change.push([cid[i][0], fund]);
                change -= fund;
                change = Math.round(change * 100) / 100;
            }
        }
    }
    if(change > 0){
        answer = {
            status : "INSUFFICIENT_FUNDS",
            change : []
        }
    } else {
        answer.status = "OPEN"
    }
    console.log(answer);
    return answer;
}