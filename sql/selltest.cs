using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Test
{
    #region Selltest
    public class Selltest
    {
        #region Member Variables
        protected unknown _商品属性;
        protected unknown _商品描述;
        protected string _姓名;
        protected unknown _电话;
        protected unknown _wechat;
        protected unknown _邮箱;
        protected int _身份;
        protected int _id;
        protected string _商品名;
        protected string _用户;
        protected int _喜欢的人;
        protected string _状态;
        #endregion
        #region Constructors
        public Selltest() { }
        public Selltest(unknown 商品属性, unknown 商品描述, string 姓名, unknown 电话, unknown wechat, unknown 邮箱, int 身份, string 商品名, string 用户, int 喜欢的人, string 状态)
        {
            this._商品属性=商品属性;
            this._商品描述=商品描述;
            this._姓名=姓名;
            this._电话=电话;
            this._wechat=wechat;
            this._邮箱=邮箱;
            this._身份=身份;
            this._商品名=商品名;
            this._用户=用户;
            this._喜欢的人=喜欢的人;
            this._状态=状态;
        }
        #endregion
        #region Public Properties
        public virtual unknown 商品属性
        {
            get {return _商品属性;}
            set {_商品属性=value;}
        }
        public virtual unknown 商品描述
        {
            get {return _商品描述;}
            set {_商品描述=value;}
        }
        public virtual string 姓名
        {
            get {return _姓名;}
            set {_姓名=value;}
        }
        public virtual unknown 电话
        {
            get {return _电话;}
            set {_电话=value;}
        }
        public virtual unknown Wechat
        {
            get {return _wechat;}
            set {_wechat=value;}
        }
        public virtual unknown 邮箱
        {
            get {return _邮箱;}
            set {_邮箱=value;}
        }
        public virtual int 身份
        {
            get {return _身份;}
            set {_身份=value;}
        }
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string 商品名
        {
            get {return _商品名;}
            set {_商品名=value;}
        }
        public virtual string 用户
        {
            get {return _用户;}
            set {_用户=value;}
        }
        public virtual int 喜欢的人
        {
            get {return _喜欢的人;}
            set {_喜欢的人=value;}
        }
        public virtual string 状态
        {
            get {return _状态;}
            set {_状态=value;}
        }
        #endregion
    }
    #endregion
}