<?hh // strict
/**
 * Copyright (c) 2014, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the "hack" directory of this source tree.
 *
 *
 */

function foo<T>(mixed $x): array<T> {
  // UNSAFE
}

function a<T>(): array<T> {
  return array();
}

function f(): void {
  $a = a();
  $b = foo($a);
}
