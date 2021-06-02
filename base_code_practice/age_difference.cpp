#include <iostream>
using namespace std;

int main(void)
{
	//freopen("input.txt", "rt", stdin);
	int n, i, num, min= 2147000000, max = -2147000000;
	cin >> n;
	for (i = 0; i < n; i++)
	{
		cin >> num;
		if (min > num) min = num;
		if (max < num) max = num;
	}
	cout << max-min;
	return 0;
}
