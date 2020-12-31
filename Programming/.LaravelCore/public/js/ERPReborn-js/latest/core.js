/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : JavaScript Class                                                                                                 |
|                                                                                                                                  |
| ▪ Class Name  : ERPReborn_JSCore                                                                                                 |
| ▪ Description : Menangani Library Utama ERP Reborn                                                                               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
class ERPReborn_JSCore
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : constructor                                                                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-30                                                                                               |
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
        //alert("ERPReborn_JSCore constructor");
        this.setJSSource();
        }

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : isScriptAlreadyIncluded                                                                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-30                                                                                               |
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
        var scripts = document.getElementsByTagName("script");
        for(var i = 0; i < scripts.length; i++)
            {
            if(scripts[i].getAttribute('src') == varURL)
                {
                return true;
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
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-30                                                                                               |
    | ▪ Description     : Mengeset Seluruh JS Source kedalam Head HTML                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    setJSSource()
        {
        this.setJSSource_Specific("js/jQuery/jquery.min.js");
        this.setJSSource_Specific("js/crypto-js/core.min.js");
        this.setJSSource_Specific("js/crypto-js/md5.js");
        this.setJSSource_Specific("js/ERPReborn-js/api-request.js");
        }
    }

    