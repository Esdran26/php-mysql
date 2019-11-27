function exportTableToExcel(tableID, filename = ''){
          var downloadLink;
          var dataType = 'application/vnd.ms-excel';
          var tableSelect = document.getElementById(tableID);
          var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
          
          // nombre del archivo
          filename = filename?filename+'.xls':'excel_data.xls';
          
          // crear el link para descargar
          downloadLink = document.createElement("a");
          
          document.body.appendChild(downloadLink);
          
          if(navigator.msSaveOrOpenBlob){
              var blob = new Blob(['ufeff', tableHTML], {
                  type: dataType
              });
              navigator.msSaveOrOpenBlob( blob, filename);
          }else{
              // crear un link para el archivo
              downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
          
              // Alistar el nombre del archivo para descargar
              downloadLink.download = filename;
              
              //lanzar la función
              downloadLink.click();
          }
}