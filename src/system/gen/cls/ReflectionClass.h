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

#ifndef __GENERATED_cls_ReflectionClass_h__
#define __GENERATED_cls_ReflectionClass_h__

#include <cls/Reflector.h>

namespace HPHP {
///////////////////////////////////////////////////////////////////////////////

/* SRC: classes/reflection.php line 538 */
class c_ReflectionClass : public ExtObjectData {
  public:

  // Properties
  Variant m_name;
  Variant m_info;

  // Class Map
  BEGIN_CLASS_MAP(ReflectionClass)
    PARENT_CLASS(Reflector)
  END_CLASS_MAP(ReflectionClass)
  DECLARE_CLASS_COMMON(ReflectionClass, ReflectionClass)
  DECLARE_INVOKE_EX(ReflectionClass, ReflectionClass, ObjectData)

  // DECLARE_STATIC_PROP_OPS
  public:
  static Variant os_getInit(CStrRef s);
  #define OMIT_JUMP_TABLE_CLASS_STATIC_GET_ReflectionClass 1
  #define OMIT_JUMP_TABLE_CLASS_STATIC_LVAL_ReflectionClass 1
  static Variant os_constant(const char *s);

  // DECLARE_INSTANCE_PROP_OPS
  public:
  virtual void o_getArray(Array &props) const;
  virtual void o_setArray(CArrRef props);
  virtual Variant *o_realProp(CStrRef s, int flags,
                              CStrRef context = null_string) const;
  Variant *o_realPropPrivate(CStrRef s, int flags) const;
  virtual Variant &o_lval(CStrRef s, CStrRef context = null_string);
  Variant &o_lvalPrivate(CStrRef s);

  // DECLARE_INSTANCE_PUBLIC_PROP_OPS
  public:
  virtual Variant *o_realPropPublic(CStrRef s, int flags) const;
  virtual Variant &o_lvalPublic(CStrRef s);

  // DECLARE_COMMON_INVOKE
  static Variant os_invoke(const char *c, MethodIndex methodIndex,
                           const char *s, CArrRef ps, int64 h, bool f = true);
  virtual Variant o_invoke(MethodIndex methodIndex, const char *s, CArrRef ps,
                           int64 h, bool f = true);
  virtual Variant o_invoke_few_args(MethodIndex methodIndex, const char *s,
                                    int64 h, int count,
                                    INVOKE_FEW_ARGS_DECL_ARGS);

  public:
  DECLARE_INVOKES_FROM_EVAL
  void init();
  public: void t___construct(Variant v_name);
  public: c_ReflectionClass *create(Variant v_name);
  public: ObjectData *dynCreate(CArrRef params, bool init = true);
  public: void dynConstruct(CArrRef params);
  public: void dynConstructFromEval(Eval::VariableEnvironment &env, const Eval::FunctionCallExpression *call);
  public: Variant t_fetch(CVarRef v_what);
  public: bool t_test(CVarRef v_what, CVarRef v_name);
  public: String t___tostring();
  public: static Variant ti_export(const char* cls, CVarRef v_name, CVarRef v_ret);
  public: Variant t_getname();
  public: Variant t_isinternal();
  public: bool t_isuserdefined();
  public: bool t_isinstantiable();
  public: bool t_hasconstant(CVarRef v_name);
  public: bool t_hasmethod(CVarRef v_name);
  public: bool t_hasproperty(CVarRef v_name);
  public: Variant t_getfilename();
  public: Variant t_getstartline();
  public: Variant t_getendline();
  public: Variant t_getdoccomment();
  public: Variant t_getconstructor();
  public: p_ReflectionMethod t_getmethod(CVarRef v_name);
  public: Array t_getmethods(CVarRef v_filter = 65535LL);
  public: p_ReflectionProperty t_getproperty(CVarRef v_name);
  public: Array t_getproperties();
  public: Variant t_getconstants();
  public: Variant t_getconstant(CVarRef v_name);
  public: Variant t_getinterfaces();
  public: Array t_getinterfacenames();
  public: Variant t_isinterface();
  public: Variant t_isabstract();
  public: Variant t_isfinal();
  public: Variant t_getmodifiers();
  public: bool t_isinstance(CVarRef v_obj);
  public: Object t_newinstance(int num_args, Array args = Array());
  public: Object t_newinstanceargs(CVarRef v_args);
  public: Variant t_getparentclass();
  public: Variant t_issubclassof(Variant v_cls);
  public: Variant t_getstaticproperties();
  public: Variant t_getstaticpropertyvalue(CVarRef v_name, CVarRef v_default = null_variant);
  public: void t_setstaticpropertyvalue(CVarRef v_name, CVarRef v_value);
  public: Variant t_getdefaultproperties();
  public: Variant t_isiterateable();
  public: bool t_implementsinterface(Variant v_cls);
  public: Variant t_getextension();
  public: Variant t_getextensionname();
  public: static Variant t_export(CVarRef v_name, CVarRef v_ret) { return ti_export("ReflectionClass", v_name, v_ret); }
};
extern struct ObjectStaticCallbacks cw_ReflectionClass;

///////////////////////////////////////////////////////////////////////////////
}

#endif // __GENERATED_cls_ReflectionClass_h__
