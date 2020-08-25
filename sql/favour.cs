using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Test
{
    #region Favour
    public class Favour
    {
        #region Member Variables
        protected int _id;
        protected string _用户;
        #endregion
        #region Constructors
        public Favour() { }
        public Favour(int id, string 用户)
        {
            this._id=id;
            this._用户=用户;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string 用户
        {
            get {return _用户;}
            set {_用户=value;}
        }
        #endregion
    }
    #endregion
}