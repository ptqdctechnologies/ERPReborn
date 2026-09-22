/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : JavaScript Class                                                                                                 |
|                                                                                                                                  |
| ▪ Class Name  : zht_JSCore                                                                                                       |
| ▪ Description : Menangani Library Utama ERP Reborn                                                                               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2023 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

class zht_IsJSFileLoaded_ZhtJSCore
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : constructor                                                                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2024-08-19                                                                                               |
    | ▪ Creation Date   : 2024-08-19                                                                                               |
    | ▪ Description     : System's Default Constructor                                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    constructor()
        {
        return true;
        }    
    }


class zht_JSCore
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : constructor                                                                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000001                                                                                           |
    | ▪ Last Update     : 2023-03-30                                                                                               |
    | ▪ Creation Date   : 2020-12-30                                                                                               |
    | ▪ Description     : System's Default Constructor                                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    constructor(varJQueryEnable = true)
        {
        //alert("ERPReborn_JSCore constructor");
        this.setJSSource(varJQueryEnable);
        }


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : isScriptAlreadyIncluded                                                                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-30                                                                                               |
    | ▪ Creation Date   : 2020-12-30                                                                                               |
    | ▪ Description     : Mengecek apakah suatu Script sudah masuk didalam Header HTML. Bila sudah diload maka akan mengembalikan  |
    |                     nilai TRUE dan bila sebaliknya akan mengembalikan nilai FALSE                                            |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ varURL ► JS Source URL                                                                                                |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ (boolean)                                                                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    isScriptAlreadyIncluded(varURL) {
        if (varURL && varURL.charAt(0) !== '/') {
            varURL = '/' + varURL;
        }
        var scripts = document.getElementsByTagName("script");
        for(var i = 0; i < scripts.length; i++)
            {
            var src = scripts[i].getAttribute('src');
            if(src) {
                if (src.charAt(0) !== '/') {
                    src = '/' + src;
                }
                if(src == varURL || scripts[i].src.indexOf(varURL) !== -1)
                    {
                    return true;
                    }
            }
            }
        return false;
        }


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : setLoadScript                                                                                            |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-30                                                                                               |
    | ▪ Creation Date   : 2020-12-30                                                                                               |
    | ▪ Description     : Mengeset Script untuk ditambahkan kedalam Head HTML                                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ varURL ► JS Source URL                                                                                                |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    setLoadScript(varURL)
        {
        if (varURL && varURL.charAt(0) !== '/') {
            varURL = '/' + varURL;
        }
        // Adding the script tag to the head as suggested before
        var varHead = document.getElementsByTagName('head')[0];
        var varScript = document.createElement('script');
        varScript.type = 'text/javascript';
        varScript.src = varURL;
        
        // Fire the loading
        varHead.appendChild(varScript);
        }


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : setJSSource_Specific                                                                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-30                                                                                               |
    | ▪ Creation Date   : 2020-12-30                                                                                               |
    | ▪ Description     : Mengeset JS Source spesifik bila belum di masukan kedalam Head HTML                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ varURL ► JS Source URL                                                                                                |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    setJSSource_Specific(varURL)
        {
        if (varURL && varURL.charAt(0) !== '/') {
            varURL = '/' + varURL;
        }
        if(this.isScriptAlreadyIncluded(varURL) == false)
            {
            this.setLoadScript(varURL);
            //alert("Load : " + varURL);
            }
        }

    
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : setJSSource                                                                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000001                                                                                           |
    | ▪ Last Update     : 2023-03-30                                                                                               |
    | ▪ Creation Date   : 2020-12-30                                                                                               |
    | ▪ Description     : Mengeset Seluruh JS Source kedalam Head HTML                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    setJSSource(varJQueryEnable)
        {
        //window.alert(varJQueryEnable);
        if(varJQueryEnable == true) {
            this.setJSSource_Specific("/js/jQuery/jquery.min.js");            
            }
        this.setJSSource_Specific("/js/crypto-js/core.min.js");
        this.setJSSource_Specific("/js/crypto-js/md5.js");
        //this.setJSSource_Specific("/js/jQuery-MD5/jquery.md5.js");
        this.setJSSource_Specific("/js/zht-js/api-request.js");
        }
    }

    