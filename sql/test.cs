using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Test
{
    #region Test
    public class Test
    {
        #region Member Variables
        protected string _password;
        protected string _name;
        protected int _ID;
        protected string _mail;
        #endregion
        #region Constructors
        public Test() { }
        public Test(string password, string name, string mail)
        {
            this._password=password;
            this._name=name;
            this._mail=mail;
        }
        #endregion
        #region Public Properties
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual int ID
        {
            get {return _ID;}
            set {_ID=value;}
        }
        public virtual string Mail
        {
            get {return _mail;}
            set {_mail=value;}
        }
        #endregion
    }
    #endregion
}