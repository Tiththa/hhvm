<?hh

// This fixme should not suppress formatting for the entire class. Ideally, it
// would suppress formatting for the line "class HasFixme {" and nothing else,
// but there isn't a straightforward way to implement this at the moment, so
// instead we do not suppress formatting for this HH_FIXME at all.
/* HH_FIXME[4110] */
class HasFixme {
  public function why() {
    // Here is a motivating example for the fixmes-suppress-formatting feature.
    // We do not want to format this node because it would move the suppression
    // comment away from the error, causing it to fail to suppress the error:

    /* HH_FIXME[4110] */
    f($some_type_error_we_would_like_to_suppress, $xxxxxxxxxx, $yyyyyyyyyy, $zzzzzzzzzz);

    // For now, we use newline count as a heuristic for judging when it is
    // reasonable to suppress formatting. Nodes which contain 3 or more newlines
    // (excluding leading trivia before the HH_FIXME, including leading trivia
    // after the HH_FIXME, and excluding all trailing trivia) will still be
    // formatted.

    // Because we're just using a heuristic, we will still have some failures,
    // like this one:

    /* HH_FIXME[4110] */
    f($some_type_error_we_would_like_to_suppress,
      $but_we_will_move_it_away_from_the_suppression_comment,
      $because_the_function_call,
      $is_split_over_too_many_lines_already);
  }

  public function cases() {
    $this_is
           + $formatted;

    /* HH_FIXME[4110] */
    this($is,
         $formatted,
         $too);

    /* HH_FIXME[4110] */
    this($is,
         $not);

    /* HH_FIXME[4110] */ this($node,
                              $is,
                              $also,
                              $formatted);

    /* HH_FIXME[4110] */ this($is,
                              $not,
                              $formatted);

    /* HH_FIXME[4110] */
    f($some_type_error_we_would_like_to_suppress, $xxxxxxxxxx, $yyyyyyyyyy, $zzzzzzzzzz)
      + $this_part_of_the_expression
        + $is_still_formatted
          + $since_formatting_is_suppressed
            + $only_for_the_function_call_node;
  }
}
