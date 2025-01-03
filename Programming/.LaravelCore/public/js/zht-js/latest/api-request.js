/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : JavaScript Class                                                                                                 |
|                                                                                                                                  |
| ▪ Class Name  : zht_JSAPIRequest                                                                                                 |
| ▪ Description : Menangani Library API Request                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

class zht_IsJSFileLoaded_ZhtJSApiRequest
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


class zht_JSAPIRequest
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : constructor                                                                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-30                                                                                               |
    | ▪ Creation Date   : 2020-12-30                                                                                               |
    | ▪ Description     : System's Default Constructor                                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    //constructor(varAPIWebToken, varURL, varAPIKey, varAPIVersion, varDataJSObject)
    constructor()
        {
        //var varReturn = this.main(varAPIWebToken, varURL, varAPIKey, varAPIVersion, varDataJSObject);
        //this.value = varReturn;
        }


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : getXRequestID                                                                                            |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-31                                                                                               |
    | ▪ Creation Date   : 2020-12-31                                                                                               |
    | ▪ Description     : Mendapatkan X Request ID                                                                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ varAPIWebToken ► API Web Token                                                                                        |
    |      ▪ varURL ► URL API Gateway                                                                                              |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ varReturn ► Return Value (JSON)                                                                                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    getXRequestID(varAPIWebToken, varURL)
        {
        var varAJAXUniqIDReturn = null;
        /*alert(varURL);
        try {
            $.ajax({
                //'url: "ajax.aspx?ajaxid=4&UserID=" + UserID + "&EmailAddress=" + encodeURIComponent(EmailAddress),'.
                url: varURL,
                async : false,
                type : "POST",
                headers : {
                    "Authorization" : this.getJSONWebTokens(varAPIWebToken)
                    },
                success: function(varDataResponse) {
                    varAJAXUniqIDReturn = JSON.stringify(varDataResponse);
                    },
                error: function(varDataResponse, varTextStatus) {
                    varAJAXUniqIDReturn = JSON.stringify(varDataResponse);
                    }
                });
            }
        catch(varError) {
            //alert("ERP Reborn Error Notification\n\nInvalid Data Request\n(" + varError + ")");
            varAJAXUniqIDReturn = '';
            }*/ 
        return varAJAXUniqIDReturn;
        }


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : getAgentDateTime                                                                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-31                                                                                               |
    | ▪ Creation Date   : 2020-12-31                                                                                               |
    | ▪ Description     : Mendapatkan Agent Date Time                                                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ varOffsetSeconds ► Offset Seconds                                                                                     |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ varReturn ► Return Value (UTC Time)                                                                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    getAgentDateTime(varOffsetSeconds)
        {
        var varObjDate = new Date();
        varObjDate.setSeconds(varObjDate.getSeconds() + ((varOffsetSeconds) ? varOffsetSeconds : 0));
        var varReturn = varObjDate.toUTCString();
        return varReturn;
        }


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : getBase64OfMD5                                                                                           |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-31                                                                                               |
    | ▪ Creation Date   : 2020-12-31                                                                                               |
    | ▪ Description     : Mendapatkan Header Base64 dari MD5 Data Request                                                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ varDataJSON ► Data JSON                                                                                               |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ varReturn ► Return Value (Base 64 MD5)                                                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    getBase64OfMD5(varDataJSON)
        {
        var varReturn = btoa(CryptoJS.MD5(String(varDataJSON).replace(/\//g, '\\/')));
        return varReturn;
        }


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : getJSONWebTokens                                                                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-31                                                                                               |
    | ▪ Creation Date   : 2020-12-31                                                                                               |
    | ▪ Description     : Mendapatkan Header JSON Web Tokens untuk                                                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ varAPIWebToken ► API Web Token                                                                                        |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ varReturn ► Return Value                                                                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    getJSONWebTokens(varAPIWebToken)
        {
        var varReturn = 'Bearer ' + varAPIWebToken;
        return varReturn;
        }


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : getUserAgent                                                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-31                                                                                               |
    | ▪ Creation Date   : 2020-12-31                                                                                               |
    | ▪ Description     : Mendapatkan Header Informasi User Agent                                                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ (void)                                                                                                                |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ varReturn ► Return Value                                                                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    getUserAgent()
        {
        var varReturn = navigator.userAgent;
        return varReturn;
        }


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : setJSONWithEmptyValueToNullReplacement                                                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-31                                                                                               |
    | ▪ Creation Date   : 2020-12-31                                                                                               |
    | ▪ Description     : Mengeset EmptyValue ke Null pada JSON yang dikonversi dari JS Object                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ varDataJSObject ► Data JS Object                                                                                      |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ varReturn ► Return Value                                                                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    setJSONWithEmptyValueToNullReplacement(varDataJSObject)
        {
        var varReturn = JSON.stringify(varDataJSObject).replace(/\:\"\"/gi, "\:null");
        return varReturn;
        }
    }


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : JavaScript Class                                                                                                 |
|                                                                                                                                  |
| ▪ Class Name  : zht_JSAPIRequest_Authentication                                                                                  |
| ▪ Description : Menangani Library API Request Authentication                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
class zht_JSAPIRequest_Authentication extends zht_JSAPIRequest
    {
    constructor(varURL, varDataJSObject)
        {
        super();
        var varReturn = this.main(varURL, varDataJSObject);
        this.value = varReturn;
        }

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : main                                                                                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-31                                                                                               |
    | ▪ Creation Date   : 2020-12-31                                                                                               |
    | ▪ Description     : Fungsi Utama                                                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ varURL ► URL API Gateway                                                                                              |
    |      ▪ varDataJSObject ► Data JS Object                                                                                      |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ varReturn ► Return Value (JSON)                                                                                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    main(varURL, varDataJSObject)
        {
        var varReturn = null;
        if (window.jQuery) {
            try
                {
                //---> Replace Empty With Null value
                var varDataJSON = this.setJSONWithEmptyValueToNullReplacement({
                    "metadata" : {
                        "API" : {
                            "version" : "latest"
                            }
                        },
                    "data" : varDataJSObject
                    });
                //console.log("xxxxxxxxxxxxxxxxxxxxxxxxxx");
                //alert(varDataJSON);
                //---> Request Parse
                $.ajax(varURL, {
                    async : false, 
                    type : "POST",
                    headers : {
                        'User-Agent' : this.getUserAgent(),
                        'Agent-DateTime' : this.getAgentDateTime(),
                        'Expires' : this.getAgentDateTime((10*60)),
                        'X-Content-MD5' : this.getBase64OfMD5(varDataJSON),
                        'X-Request-ID' : this.getXRequestID('', varURL)
                        },
                    data : varDataJSON,
                    contentType : "application/json",
                    success : function(varDataResponse, varTextStatus, varObjXHR)
                        {
                        //'$("body").append(JSON.stringify(varObjXHR)); '.
                        //'$("body").append(JSON.stringify(varTextStatus)); '.
                        //'$("body").append(JSON.stringify(varDataResponse)); '.
                        //'alert("Success"); '.
                        //'varAJAXReturn = "Success"; '.
                        varReturn = JSON.stringify(varDataResponse);
                        },
                    error : function(varDataResponse, varTextStatus)
                        {
                        //'varStatusCode = varDataResponse.status; '.
                        //'varStatusText = varDataResponse.statusText; '.
                        //'varContent = varDataResponse.responseText; '.
                        //'varReadyState = varDataResponse.readyState; '.
                        //'$("body").append(JSON.stringify(varDataResponse)); '.
                        //'alert("Failed, Error " + JSON.stringify(varDataResponse));  '.
                        //'varAJAXReturn = "Failed"; '.
                        varReturn = JSON.stringify(varDataResponse);
                        }
                    });
                //alert(varReturn);
                //$("body").append(JSON.stringify(varReturn));
                return varReturn;
                }
            catch(varError) {
                alert("ERP Reborn Error Notification\n\nInvalid Data Request\n(" + varError + ")");
                }
            }
        else {
            alert("jQuery is not yet loaded\nPlease initialize jQuery first by using Helper Object :\n\n\\App\\Helpers\\ZhtHelper\\General\\Helper_JavaScript::setLibrary($varUserSession)");
            }
        return varReturn;
        }
    }


/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : JavaScript Class                                                                                                 |
|                                                                                                                                  |
| ▪ Class Name  : zht_JSAPIRequest_Gateway                                                                                         |
| ▪ Description : Menangani Library API Request Gateway                                                                            |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
class zht_JSAPIRequest_Gateway extends zht_JSAPIRequest
    {
    constructor(varAPIWebToken, varURL, varAPIKey, varAPIVersion, varDataJSObject, varTimeOut)
        {
        super();
        
        var varReturn = 
            this.main(
                varAPIWebToken,
                varURL,
                varAPIKey,
                varAPIVersion,
                varDataJSObject,
                varTimeOut
                );
        this.value = varReturn;
        }


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Method Name     : main                                                                                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Version         : 1.0000.0000000                                                                                           |
    | ▪ Last Update     : 2020-12-31                                                                                               |
    | ▪ Creation Date   : 2020-12-31                                                                                               |
    | ▪ Description     : Fungsi Utama                                                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Input Variable  :                                                                                                          |
    |      ▪ varAPIWebToken ► API Web Token                                                                                        |
    |      ▪ varURL ► URL API Gateway                                                                                              |
    |      ▪ varAPIKey ► API Key                                                                                                   |
    |      ▪ varAPIVersion ► API Version                                                                                           |
    |      ▪ varDataJSObject ► Data JS Object                                                                                      |
    | ▪ Output Variable :                                                                                                          |
    |      ▪ varReturn ► Return Value (JSON)                                                                                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    main (varAPIWebToken, varURL, varAPIKey, varAPIVersion, varDataJSObject, varTimeOut)
        {        
        //alert(varAPIWebToken);
        //alert(varURL);
        
        if (varTimeOut == null) {
            varTimeOut = 5000;
            }
        //alert(JSON.stringify(varDataJSObject));

        var varReturn = null;

        if (window.jQuery) {
            try
                {
                //---> Replace Empty With Null value
                var varDataJSON = 
                    this.setJSONWithEmptyValueToNullReplacement(
                        {
                        "metadata" : {
                            "API" : {
                                "key" : varAPIKey,
                                "version" : varAPIVersion
                                }
                            },
                        "data" : varDataJSObject
                        }
                        );
                //alert(varDataJSON);
              
                var varDataJSONUnicodeEscaped = varDataJSON;
                varDataJSONUnicodeEscaped = 
                    varDataJSONUnicodeEscaped.replace(
                        /[^\0-~]/g,
                        function(ch) {
                            return "\\u" + ("000" + ch.charCodeAt().toString(16)).slice(-4);
                            }
                        );
                //alert(varDataJSONUnicodeEscaped);
                               
                //alert(varDataJSON);
                varDataJSONUnicodeEscaped = 
                    varDataJSONUnicodeEscaped.replace(
                        "\"parameter\":{}",
                        "\"parameter\":[]"
                        );
                //alert(varDataJSONUnicodeEscaped);
                //alert(this.getBase64OfMD5(varDataJSONUnicodeEscaped));


                //alert(varDataJSONUnicodeEscaped);
                //alert(varURL);
                //alert(varAPIWebToken);

                //---> Request Parse
                $.ajax(
                    varURL, 
                    {
                    async : false, 
                    type : "POST",
                    beforeSend :
                        function (varObjXHR) {
                            //varObjXHR.withCredentials = false;
                            varObjXHR.setRequestHeader('X-Test-Header', 'test-value');
                            },
                    headers : {
                        'Authorization' : this.getJSONWebTokens(varAPIWebToken),
//                        'User-Agent' : this.getUserAgent(),
                        'Agent-DateTime' : this.getAgentDateTime(),
                        'Expires' : this.getAgentDateTime((10*60)),
                        'X-Content-MD5' : this.getBase64OfMD5(varDataJSONUnicodeEscaped),
//                        'X-Request-ID' : this.getXRequestID(varAPIWebToken, varURL),
                        },
                    dataType: "json",
                    //dataType: "jsonp",
                    data : varDataJSON,
                    contentType : "application/json",
                    success : 
                        function (varDataResponse, varTextStatus, varObjXHR) {
                            //alert(varDataJSON);
                            //alert(varObjXHR.status);
                            //alert(JSON.stringify(varDataResponse));

                            //alert(JSON.stringify(varDataResponse));
                            //alert(JSON.stringify(varDataResponse.metadata.successStatus));

                            //'$("body").append(JSON.stringify(varObjXHR)); '.
                            //'$("body").append(JSON.stringify(varTextStatus)); '.
                            //'$("body").append(JSON.stringify(varDataResponse)); '.
                            //'alert("Success"); '.
                            //'varAJAXReturn = "Success"; '.
                            //varReturn = JSON.stringify(varDataResponse);

                            varReturn = 
                                JSON.stringify(
                                    JSON.parse(
                                        '{' +
                                        '"metadata" : {' + 
                                            '"HTTPStatusCode" : ' + varObjXHR.status + ', ' +
                                            '"APIResponse" : ' + JSON.stringify(varDataResponse.metadata.APIResponse) + ', ' +
                                            '"successStatus" : ' + JSON.stringify(varDataResponse.metadata.successStatus) + 
                                            '}, ' +
                                        '"data" : ' + JSON.stringify(varDataResponse.data) +
                                        '}'
                                        )
                                    );
                            //alert(JSON.stringify(varDataResponse.data));
                            //alert(varReturn);
                            },
//                    error : function(varDataResponse, varTextStatus, errorThrown)
                    error :
                        function(varObjXHR, varTextStatus, errorThrown)
    //                    error : function(varObjXHR, varTextStatus, varDataResponse)
                            {
                            //'varStatusCode = varDataResponse.status; '.
                            //'varStatusText = varDataResponse.statusText; '.
                            //'varContent = varDataResponse.responseText; '.
                            //'varReadyState = varDataResponse.readyState; '.
                            //'$("body").append(JSON.stringify(varDataResponse)); '.
                            //'alert("Failed, Error " + JSON.stringify(varDataResponse));  '.
                            //'varAJAXReturn = "Failed"; '.

                            //let varHTTPStatusCode = varObjXHR.status;

                            let varReponseTextJSON = (JSON.parse(varObjXHR.responseText));
                            let varReponseTextMessage = JSON.stringify(varReponseTextJSON.message);
                            let varReponseTextException = JSON.stringify(varReponseTextJSON.exception);
                            let varReponseTextFile = JSON.stringify(varReponseTextJSON.file);

                            varReponseTextMessage = varReponseTextMessage.slice(0, varReponseTextMessage.length-1);
                            varReponseTextMessage = (varReponseTextMessage.slice(varReponseTextMessage.indexOf('Error Message ► '))).replace('Error Message ► ', '');

                            varReturn = 
                                JSON.stringify(
                                    JSON.parse(
                                        '{' +
                                        '"metadata" : {' + 
                                            '"HTTPStatusCode" : ' + varObjXHR.status + ', ' +
                                            '"APIResponse" : ' + JSON.stringify((JSON.parse(varDataJSON)).metadata.API) + ', ' +
                                            '"successStatus" : false' + 
                                            '}, ' +
                                        '"data" : ' + '{' +
                                            '"message" : "' + varReponseTextMessage + '"' + 
                                            '}' +
                                        '}'
                                        )
                                    );
                            },
                    timeout : varTimeOut
                    });
                //alert(varReturn);
                //$("body").append(JSON.stringify(varReturn));
                return varReturn;
                }

            catch (varError) {
                alert("ERP Reborn Error Notification\n\nInvalid Data Request\n(" + varError + ")");
                }
            }
        else {
            alert("jQuery is not yet loaded\nPlease initialize jQuery first by using Helper Object :\n\n\\App\\Helpers\\ZhtHelper\\General\\Helper_JavaScript::setLibrary($varUserSession)");
            }

        return varReturn;
        }
    }