/*
   +----------------------------------------------------------------------+
   | HipHop for PHP                                                       |
   +----------------------------------------------------------------------+
   | Copyright (c) 2010 Facebook, Inc. (http://www.facebook.com)          |
   +----------------------------------------------------------------------+
   | This source file is subject to version 3.01 of the PHP license,      |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | http://www.php.net/license/3_01.txt                                  |
   | If you did not receive a copy of the PHP license and are unable to   |
   | obtain it through the world-wide-web, please send a note to          |
   | license@php.net so we can mail you a copy immediately.               |
   +----------------------------------------------------------------------+
*/
// @generated by HipHop Compiler

#ifndef __GENERATED_cls_ReflectionFunctionAbstract_h__
#define __GENERATED_cls_ReflectionFunctionAbstract_h__


namespace HPHP {
///////////////////////////////////////////////////////////////////////////////

/* SRC: classes/reflection.php line 248 */
class c_ReflectionFunctionAbstract : public ExtObjectData {
  public:

  // Properties
  Variant m_info;

  // Class Map
  BEGIN_CLASS_MAP(ReflectionFunctionAbstract)
  END_CLASS_MAP(ReflectionFunctionAbstract)
  DECLARE_CLASS_COMMON(ReflectionFunctionAbstract, ReflectionFunctionAbstract)
  DECLARE_INVOKE_EX(ReflectionFunctionAbstract, ReflectionFunctionAbstract, ObjectData)

  // DECLARE_STATIC_PROP_OPS
  public:
  static Variant os_getInit(CStrRef s);
  #define OMIT_JUMP_TABLE_CLASS_STATIC_GET_ReflectionFunctionAbstract 1
  #define OMIT_JUMP_TABLE_CLASS_STATIC_LVAL_ReflectionFunctionAbstract 1
  #define OMIT_JUMP_TABLE_CLASS_CONSTANT_ReflectionFunctionAbstract 1

  // DECLARE_INSTANCE_PROP_OPS
  public:
  virtual void o_getArray(Array &props) const;
  #define OMIT_JUMP_TABLE_CLASS_SETARRAY_ReflectionFunctionAbstract 1
  #define OMIT_JUMP_TABLE_CLASS_realProp_ReflectionFunctionAbstract 1
  #define OMIT_JUMP_TABLE_CLASS_realProp_PRIVATE_ReflectionFunctionAbstract 1
  #define OMIT_JUMP_TABLE_CLASS_lval_ReflectionFunctionAbstract 1
  #define OMIT_JUMP_TABLE_CLASS_lval_PRIVATE_ReflectionFunctionAbstract 1

  // DECLARE_INSTANCE_PUBLIC_PROP_OPS
  public:
  virtual Variant *o_realPropPublic(CStrRef s, int flags) const;
  virtual Variant &o_lvalPublic(CStrRef s);

  // DECLARE_COMMON_INVOKE
  #define OMIT_JUMP_TABLE_CLASS_STATIC_INVOKE_ReflectionFunctionAbstract 1
  virtual Variant o_invoke(MethodIndex methodIndex, const char *s, CArrRef ps,
                           int64 h, bool f = true);
  virtual Variant o_invoke_few_args(MethodIndex methodIndex, const char *s,
                                    int64 h, int count,
                                    INVOKE_FEW_ARGS_DECL_ARGS);

  public:
  DECLARE_INVOKES_FROM_EVAL
  void init();
  public: Variant t_getname();
  public: Variant t_isinternal();
  public: Variant t_getclosure();
  public: bool t_isuserdefined();
  public: Variant t_getfilename();
  public: Variant t_getstartline();
  public: Variant t_getendline();
  public: Variant t_getdoccomment();
  public: Variant t_getstaticvariables();
  public: Variant t_returnsreference();
  public: Array t_getparameters();
  public: int t_getnumberofparameters();
  public: int64 t_getnumberofrequiredparameters();
};
extern struct ObjectStaticCallbacks cw_ReflectionFunctionAbstract;

///////////////////////////////////////////////////////////////////////////////
}

#endif // __GENERATED_cls_ReflectionFunctionAbstract_h__
