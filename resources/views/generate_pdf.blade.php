
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">  
<style type="text/css">
    .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: auto;  
  height: auto; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 0px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}

</style>

  </head>
  <body>
    <header class="clearfix">
      
      <h1>{{$entete}}</h1>
      <div id="company" class="clearfix">
        <div>AGENCE BAUDOUIN TRANSFERT</div>
        <div>N AGR: BCC 0055/MF/A<br /> RCCM:148-3288 ID.NAT:6-610-N58598M</div>
        <div>Av KATSHI N:1031-KINSHASA/GOMBE</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
            @if($indice=='1')
              <div><span>AGENCE</span>{{$agence}}</div>
            <div><span>CLIENT EXP:</span>{{$expiditeur}}</div>
            <div><span>DATE ENVOIE</span>{{$date}}</div>
            @else
            <div><span>AGENCE</span>{{$agence}}</div>
            <div><span>CLIENT EXP:</span>{{$expiditeur}}</div>
            @endif                
      </div>
    </header>
    <main>
    @if($indice=='1')
    <table>
        <thead>
          <tr>
            <th class="service">BENEFICIAIRE</th>
            <th class="service">Ville</th>
            <th class="desc">TELEPHONE</th>
            <th>MONTANT PAYE </th>
            <th>NUMERO</th> 
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">{{$beneficiere}}</td>
            <td class="service">{{$ville}}</td>
            <td class="service">{{$tel1}}</td>
            <td class="service">{{$montant}} {{$devise}}</td>
            <td class="service">{{$trans}}</td>
            
          </tr>
          <tr>
            <td colspan="3">TOTAL</td>
            <td class="total">{{$montant}} {{$devise}}</td>
          </tr>
          <tr>
            <td colspan="3">TAUX </td>
            <td class="total">{{$montantcom}} {{$devise}}</td>
          </tr>
          <tr>
            <td colspan="3" class="grand total">TOTAL TRANS</td>
            <td class="grand total">{{$montant}} {{$devise}}</td>
          </tr>
        </tbody>
      </table>
    @else
    <table>
        <thead>
          <tr>
            <th class="service">Agence servis</th>
            <th class="service">Ville Desti.</th>
            <th class="service">BENEFICIAIRE</th>
            <th class="service">MONTANT PAYE </th>
            <th>NUMERO</th> 
          </tr>
        </thead>
        <tbody>
          <tr>
          <td class="service">{{$agencedest}}</td>
            <td class="service">{{$villedes}}</td>
            <td class="service">{{$beneficiere}}</td>
            <td class="unit">{{$montant}} {{$devise}}</td>
            <td class="qty">{{$trans}}</td>
            
          </tr>
          <tr>
            <td colspan="4">TAUX </td>
            <td class="total">{{$montantcom}} {{$devise}}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL TRANS</td>
            <td class="grand total">{{$montant}} {{$devise}}</td>
          </tr>
        </tbody>
      </table>
    @endif       
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Le delai de retrait est d'un mois (30 jours).<span style="padding-left:5%"class="a">Signature Agent...................</span> / <span class="a">Signature Client..................</span> </div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html> 

