﻿//------------------------------------------------------------------------------
// <auto-generated>
//     Il codice è stato generato da uno strumento.
//     Versione runtime:4.0.30319.42000
//
//     Le modifiche apportate a questo file possono provocare un comportamento non corretto e andranno perse se
//     il codice viene rigenerato.
// </auto-generated>
//------------------------------------------------------------------------------

namespace equazioni_console.equazioni_servizio {
    
    
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    [System.ServiceModel.ServiceContractAttribute(ConfigurationName="equazioni_servizio.equazioni_servizioSoap")]
    public interface equazioni_servizioSoap {
        
        // CODEGEN: Generazione di un contratto di messaggio perché il nome di elemento equazioneResult dallo spazio dei nomi http://tempuri.org/ non è contrassegnato come nillable
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/equazione", ReplyAction="*")]
        equazioni_console.equazioni_servizio.equazioneResponse equazione(equazioni_console.equazioni_servizio.equazioneRequest request);
        
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/equazione", ReplyAction="*")]
        System.Threading.Tasks.Task<equazioni_console.equazioni_servizio.equazioneResponse> equazioneAsync(equazioni_console.equazioni_servizio.equazioneRequest request);
    }
    
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Advanced)]
    [System.ServiceModel.MessageContractAttribute(IsWrapped=false)]
    public partial class equazioneRequest {
        
        [System.ServiceModel.MessageBodyMemberAttribute(Name="equazione", Namespace="http://tempuri.org/", Order=0)]
        public equazioni_console.equazioni_servizio.equazioneRequestBody Body;
        
        public equazioneRequest() {
        }
        
        public equazioneRequest(equazioni_console.equazioni_servizio.equazioneRequestBody Body) {
            this.Body = Body;
        }
    }
    
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Advanced)]
    [System.Runtime.Serialization.DataContractAttribute(Namespace="http://tempuri.org/")]
    public partial class equazioneRequestBody {
        
        [System.Runtime.Serialization.DataMemberAttribute(Order=0)]
        public double a;
        
        [System.Runtime.Serialization.DataMemberAttribute(Order=1)]
        public double b;
        
        [System.Runtime.Serialization.DataMemberAttribute(Order=2)]
        public double c;
        
        public equazioneRequestBody() {
        }
        
        public equazioneRequestBody(double a, double b, double c) {
            this.a = a;
            this.b = b;
            this.c = c;
        }
    }
    
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Advanced)]
    [System.ServiceModel.MessageContractAttribute(IsWrapped=false)]
    public partial class equazioneResponse {
        
        [System.ServiceModel.MessageBodyMemberAttribute(Name="equazioneResponse", Namespace="http://tempuri.org/", Order=0)]
        public equazioni_console.equazioni_servizio.equazioneResponseBody Body;
        
        public equazioneResponse() {
        }
        
        public equazioneResponse(equazioni_console.equazioni_servizio.equazioneResponseBody Body) {
            this.Body = Body;
        }
    }
    
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Advanced)]
    [System.Runtime.Serialization.DataContractAttribute(Namespace="http://tempuri.org/")]
    public partial class equazioneResponseBody {
        
        [System.Runtime.Serialization.DataMemberAttribute(EmitDefaultValue=false, Order=0)]
        public string equazioneResult;
        
        public equazioneResponseBody() {
        }
        
        public equazioneResponseBody(string equazioneResult) {
            this.equazioneResult = equazioneResult;
        }
    }
    
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    public interface equazioni_servizioSoapChannel : equazioni_console.equazioni_servizio.equazioni_servizioSoap, System.ServiceModel.IClientChannel {
    }
    
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    public partial class equazioni_servizioSoapClient : System.ServiceModel.ClientBase<equazioni_console.equazioni_servizio.equazioni_servizioSoap>, equazioni_console.equazioni_servizio.equazioni_servizioSoap {
        
        public equazioni_servizioSoapClient() {
        }
        
        public equazioni_servizioSoapClient(string endpointConfigurationName) : 
                base(endpointConfigurationName) {
        }
        
        public equazioni_servizioSoapClient(string endpointConfigurationName, string remoteAddress) : 
                base(endpointConfigurationName, remoteAddress) {
        }
        
        public equazioni_servizioSoapClient(string endpointConfigurationName, System.ServiceModel.EndpointAddress remoteAddress) : 
                base(endpointConfigurationName, remoteAddress) {
        }
        
        public equazioni_servizioSoapClient(System.ServiceModel.Channels.Binding binding, System.ServiceModel.EndpointAddress remoteAddress) : 
                base(binding, remoteAddress) {
        }
        
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Advanced)]
        equazioni_console.equazioni_servizio.equazioneResponse equazioni_console.equazioni_servizio.equazioni_servizioSoap.equazione(equazioni_console.equazioni_servizio.equazioneRequest request) {
            return base.Channel.equazione(request);
        }
        
        public string equazione(double a, double b, double c) {
            equazioni_console.equazioni_servizio.equazioneRequest inValue = new equazioni_console.equazioni_servizio.equazioneRequest();
            inValue.Body = new equazioni_console.equazioni_servizio.equazioneRequestBody();
            inValue.Body.a = a;
            inValue.Body.b = b;
            inValue.Body.c = c;
            equazioni_console.equazioni_servizio.equazioneResponse retVal = ((equazioni_console.equazioni_servizio.equazioni_servizioSoap)(this)).equazione(inValue);
            return retVal.Body.equazioneResult;
        }
        
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Advanced)]
        System.Threading.Tasks.Task<equazioni_console.equazioni_servizio.equazioneResponse> equazioni_console.equazioni_servizio.equazioni_servizioSoap.equazioneAsync(equazioni_console.equazioni_servizio.equazioneRequest request) {
            return base.Channel.equazioneAsync(request);
        }
        
        public System.Threading.Tasks.Task<equazioni_console.equazioni_servizio.equazioneResponse> equazioneAsync(double a, double b, double c) {
            equazioni_console.equazioni_servizio.equazioneRequest inValue = new equazioni_console.equazioni_servizio.equazioneRequest();
            inValue.Body = new equazioni_console.equazioni_servizio.equazioneRequestBody();
            inValue.Body.a = a;
            inValue.Body.b = b;
            inValue.Body.c = c;
            return ((equazioni_console.equazioni_servizio.equazioni_servizioSoap)(this)).equazioneAsync(inValue);
        }
    }
}
