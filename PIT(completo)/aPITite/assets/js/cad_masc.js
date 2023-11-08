function mascara_telefone ()
        {
           //limitador
         var tel = document.getElementById("phone").value
            console.log(tel)
          tel=tel.slice(0,14) //(pode limitar a quantidade de char na entrada pelo java script)
            console.log(tel)
          document.getElementById("phone").value=tel
     tel=document.getElementById("phone").value.slice(0,10)
            console.log(tel)
           
            //máscara
            var tel_formatado = document.getElementById("phone").value
            if (tel_formatado[0]!="(")
            {
                if(tel_formatado[0]!=undefined)
                {
                    document.getElementById("phone").value="("+tel_formatado[0];
                }
            }

            if (tel_formatado[3]!=")")
            {
                if(tel_formatado[3]!=undefined)
                {
                    document.getElementById("phone").value=tel_formatado.slice(0,3)+")"+tel_formatado[3]
                }
            }

            if (tel_formatado[9]!="-")
            {
                if(tel_formatado[9]!=undefined)
                {
                    document.getElementById("phone").value=tel_formatado.slice(0,9)+"-"+tel_formatado[9]
                }
            }
}

function cpf_mask(){
    var cpf = document.getElementById("cpf").value
    cpf=cpf.slice(0,14)
    document.getElementById("cpf").value = cpf
    cpf=document.getElementById("cpf").value.slice(0,10)

    var cpf_formatado = document.getElementById("cpf").value
    if(cpf_formatado[3]!="."){
        if(cpf_formatado[3]!=undefined){
            document.getElementById("cpf").value=cpf_formatado.slice(0,3)+"."+cpf_formatado[3]
        }
    }

    var cpf_formatado = document.getElementById("cpf").value
    if(cpf_formatado[7]!="."){
        if(cpf_formatado[7]!=undefined){
            document.getElementById("cpf").value=cpf_formatado.slice(0,7)+"."+cpf_formatado[7]
        }
    }

    var cpf_formatado = document.getElementById("cpf").value
    if(cpf_formatado[11]!="-"){
        if(cpf_formatado[11]!=undefined){
            document.getElementById("cpf").value=cpf_formatado.slice(0,11)+"-"+cpf_formatado[11]
        }
    }
}