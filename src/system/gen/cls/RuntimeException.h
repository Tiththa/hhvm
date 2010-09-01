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

#ifndef __GENERATED_cls_RuntimeException_h__
#define __GENERATED_cls_RuntimeException_h__

#include <cls/Exception.h>

namespace HPHP {
///////////////////////////////////////////////////////////////////////////////

/* SRC: classes/exception.php line 217 */
class c_RuntimeException : public c_Exception {
  public:

  // Properties

  // Class Map
  BEGIN_CLASS_MAP(RuntimeException)
    PARENT_CLASS(Exception)
  END_CLASS_MAP(RuntimeException)
  DECLARE_CLASS_COMMON(RuntimeException, RuntimeException)
  DECLARE_INVOKE_EX(RuntimeException, RuntimeException, Exception)

  // DECLARE_STATIC_PROP_OPS
  public:
  #define OMIT_JUMP_TABLE_CLASS_STATIC_GETINIT_RuntimeException 1
  #define OMIT_JUMP_TABLE_CLASS_STATIC_GET_RuntimeException 1
  #define OMIT_JUMP_TABLE_CLASS_STATIC_LVAL_RuntimeException 1
  #define OMIT_JUMP_TABLE_CLASS_CONSTANT_RuntimeException 1

  // DECLARE_INSTANCE_PROP_OPS
  public:
  #define OMIT_JUMP_TABLE_CLASS_GETARRAY_RuntimeException 1
  #define OMIT_JUMP_TABLE_CLASS_SETARRAY_RuntimeException 1
  #define OMIT_JUMP_TABLE_CLASS_realProp_RuntimeException 1
  #define OMIT_JUMP_TABLE_CLASS_realProp_PRIVATE_RuntimeException 1
  #define OMIT_JUMP_TABLE_CLASS_lval_RuntimeException 1
  #define OMIT_JUMP_TABLE_CLASS_lval_PRIVATE_RuntimeException 1

  // DECLARE_INSTANCE_PUBLIC_PROP_OPS
  public:
  #define OMIT_JUMP_TABLE_CLASS_realProp_PUBLIC_RuntimeException 1
  #define OMIT_JUMP_TABLE_CLASS_lval_PUBLIC_RuntimeException 1

  // DECLARE_COMMON_INVOKE
  #define OMIT_JUMP_TABLE_CLASS_STATIC_INVOKE_RuntimeException 1
  virtual Variant o_invoke(MethodIndex methodIndex, const char *s, CArrRef ps,
                           int64 h, bool f = true);
  virtual Variant o_invoke_few_args(MethodIndex methodIndex, const char *s,
                                    int64 h, int count,
                                    INVOKE_FEW_ARGS_DECL_ARGS);

  public:
  DECLARE_INVOKES_FROM_EVAL
  void init();
};
extern struct ObjectStaticCallbacks cw_RuntimeException;

///////////////////////////////////////////////////////////////////////////////
}

#endif // __GENERATED_cls_RuntimeException_h__
