#include<stdio.h>
#include<stdlib.h>
int count=0;
  struct node
{
    int key;
    struct node *left, *right;
};
  
// A utility function to create a new BST node
struct node *newNode(int item)
{
    struct node *temp =  (struct node *)malloc(sizeof(struct node));
    temp->key = item;
    temp->left = temp->right = NULL;
    return temp;
}
  
// A utility function to do inorder traversal of BST
int inorder(struct node *root)
{   
    if (root == NULL)
    return 0;
    else
    {
        inorder(root->left);
		count++;
        inorder(root->right);
    }
   return count;
}
int maxDepth(struct node *root){
	int ldepth,rdepth;
	if(root==NULL){
	return 0;
	}
	else {
		ldepth=maxDepth(root->left);
		rdepth=maxDepth(root->right);
		
		if(ldepth<rdepth) return (rdepth+1);
		else return(ldepth+1);
	}
}
void printarr(int path[], int len){
	int i;
	for(i=0;i<len;i++){
		printf("%d\t",path[i]);
	}
	printf("\n");
}
void printPathRecur(struct node *root,int path[],int pathlen) {
	
	if(root==NULL) return;
	
	path[pathlen]=root->key;
	pathlen++;
	if(root->left==NULL && root->right==NULL)
		printarr(path,pathlen);
	else {
		printPathRecur(root->left,path,pathlen);
		printPathRecur(root->right,path,pathlen);
	}
}
void printPath(struct node *root){
	int path[1000];
	printPathRecur(root,path,0);
	
}
/* A utility function to insert a new node with given key in BST */
struct node* insert(struct node* node, int key)
{
    /* If the tree is empty, return a new node */
    if (node == NULL) return newNode(key);
 
    /* Otherwise, recur down the tree */
    if (key < node->key)
        node->left  = insert(node->left, key);
    else if (key > node->key)
        node->right = insert(node->right, key);   
 
    /* return the (unchanged) node pointer */
    return node;
}
  
// Driver Program to test above functions
int main()
{
    /* Let us create following BST
              50
           /     \
          30      70
         /  \    /  \
       20   40  60   80 */
    struct node *root = NULL;
    int depth=0;
    root = insert(root, 50);
    insert(root, 30);
    insert(root, 20);
    insert(root, 40);
        insert(root, 15);
    insert(root, 12);

    insert(root, 70);
    insert(root, 60);
    insert(root, 80);
        insert(root, 35);

  
    // print inoder traversal of the BST
    count=inorder(root);
  printf("count=%d\n",count);
  depth=maxDepth(root);
    printf("Depth=%d\n",depth);
	printPath(root);
    return 0;
    
}